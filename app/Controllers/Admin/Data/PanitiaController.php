<?php

namespace App\Controllers\Admin\Data;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PanitiaModel;
use App\Models\CabangModel;
use App\Models\SeksiModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PanitiaController extends BaseController
{
    protected $panitiaModel;
    protected $cabangModel;
    protected $seksiModel;

    public function __construct()
    {
        $this->panitiaModel = new PanitiaModel();
        $this->cabangModel  = new CabangModel();
        $this->seksiModel   = new SeksiModel();
    }

    public function index()
    {
        $model = new \App\Models\PanitiaModel();

        $search = $this->request->getGet('search');

        $builder = $model
            ->select('panitia.*, cabang.nama_cabang, seksi.nama_seksi')
            ->join('cabang', 'cabang.id = panitia.cabang_id')
            ->join('seksi', 'seksi.id = panitia.seksi_id')
            ->orderBy('panitia.nama', 'ASC');

        if ($search) {
            $builder->groupStart()
                ->like('panitia.nama', $search)
                ->orLike('panitia.no_hp', $search)
                ->orLike('cabang.nama_cabang', $search)
                ->orLike('seksi.nama_seksi', $search)
                ->groupEnd();
        }

        $data['panitia'] = $builder->paginate(10, 'panitia'); // 10 per halaman
        $data['pager']   = $model->pager;
        $data['search']  = $search;

        return view('admin/panitia/index', $data);
    }

    public function create()
    {
        $data['cabang'] = $this->cabangModel->findAll();
        $data['seksi']  = $this->seksiModel->findAll();

        return view('panitia/create', $data);
    }

    public function store()
    {
        $this->panitiaModel->save([
            'nama'       => $this->request->getPost('nama'),
            'no_hp'      => $this->request->getPost('no_hp'),
            'cabang_id'  => $this->request->getPost('cabang_id'),
            'seksi_id'   => $this->request->getPost('seksi_id'),
            'jabatan'    => $this->request->getPost('jabatan'),
        ]);

        return redirect()->to('/panitia')->with('success', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        $this->panitiaModel->delete($id);
        return redirect()->to('/panitia')->with('success', 'Data berhasil dihapus');
    }

    public function import()
    {
        $file = $this->request->getFile('file');

        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak valid');
        }

        if ($file->getExtension() !== 'xlsx') {
            return redirect()->back()->with('error', 'File harus format XLSX');
        }

        try {

            $spreadsheet = IOFactory::load($file->getTempName());
            $rows = $spreadsheet->getActiveSheet()->toArray();

            unset($rows[0]); // hapus header

            $panitiaModel = new PanitiaModel();
            $cabangModel  = new CabangModel();
            $seksiModel   = new SeksiModel();

            $success = 0;
            $errors  = [];

            foreach ($rows as $index => $row) {

                $nama   = trim($row[0] ?? '');
                $no_hp  = trim($row[1] ?? '');
                $cabang = trim($row[2] ?? '');
                $seksi  = trim($row[3] ?? '');
                $jabatan = trim($row[4] ?? '');

                if (!$nama) {
                    $errors[] = "Baris " . ($index + 1) . " nama kosong";
                    continue;
                }

                // cari cabang
                if (is_numeric($cabang)) {
                    $cabangData = $cabangModel->find($cabang);
                } else {
                    $cabangData = $cabangModel
                        ->where('nama_cabang', $cabang)
                        ->first();
                }

                if (!$cabangData) {
                    $errors[] = "Cabang '$cabang' tidak ditemukan (baris " . ($index + 1) . ")";
                    continue;
                }

                // cari seksi
                $seksi = trim($seksi);

                if (is_numeric($seksi)) {
                    $seksiData = $seksiModel->find($seksi);
                } else {
                    $seksiData = $seksiModel
                        ->where('LOWER(nama_seksi)', strtolower($seksi))
                        ->first();
                }

                if (!$seksiData) {
                    $errors[] = "Seksi '$seksi' tidak ditemukan (baris " . ($index + 1) . ")";
                    continue;
                }

                $panitiaModel->insert([
                    'nama'       => $nama,
                    'no_hp'      => $no_hp,
                    'cabang_id'  => $cabangData['id'],
                    'seksi_id'   => $seksiData['id'],
                    'jabatan'    => $jabatan,
                ]);

                $success++;
            }

            return redirect()->back()->with('import_result', [
                'success' => $success,
                'errors'  => $errors
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
