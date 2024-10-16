<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GelarController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\JabatanFungsionalController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\OPPTController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\VerifikatorController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::post('/import-csv', [CsvImportController::class, 'import'])->name('import.csv');
Route::get('/import-csv', [CsvImportController::class, 'index'])->name('index.csv');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dosen/datadosen', function () {
    return view('home.anggota.data_dosen');
})->name('datadosen');

Route::get('/dosen/pendaftarandosen', function () {
    return view('home.anggota.dosen.pendaftaran_dosen');
})->name('pendaftarandosen');

Route::get('/profil', function () {
    return view('home.profil.profil');
})->name('profil');



Route::get('/lldikti/pendaftaranverifikator', function () {
    return view('home.anggota.lldikti.pendaftaran_verifikator');
})->name('pendaftaranverifikator');

Route::get('/lldikti/pendaftarankeuangan', function () {
    return view('home.anggota.lldikti.pendaftaran_keuangan');
})->name('pendaftarankeuangan');

Route::get('/lldikti/pendaftaranperencanaan', function () {
    return view('home.anggota.lldikti.pendaftaran_perencanaan');
})->name('pendaftaranperencanaan');

Route::get('/dosen/editdosen', function () {
    return view('home.anggota.dosen.edit_dosen');
})->name('editdosen');

Route::get('/operator/editoperator', function () {
    return view('home.anggota.operator.edit_operator');
})->name('editoperator');

Route::get('/lldikti/editkeuangan', function () {
    return view('home.anggota.lldikti.edit_keuangan');
})->name('editkeuangan');

Route::get('/lldikti/editperencanaan', function () {
    return view('home.anggota.lldikti.edit_perencanaan');
})->name('editperencanaan');

Route::get('/lldikti/editverifikator', function () {
    return view('home.anggota.lldikti.edit_verifikator');
})->name('editverifikator');

Route::get('/pengajuan/datapengajuan', function () {
    return view('home.pengajuan.data_pengajuan');
})->name('datapengajuan');

Route::get('/profil/faq', function () {
    return view('home.profil.faq');
})->name('faq');

Route::get('/profil/setelan', function () {
    return view('home.profil.setelan');
})->name('setelan');

Route::get('/tunjangan/pengajuan/datapengajuan/ajukanbulanan', function () {
    return view('home.tunjangan.pengajuan.ajukan_bulanan');
});

Route::get('/tunjangan/pengajuan/datapengajuan/ajukansemester', function () {
    return view('home.tunjangan.pengajuan.ajukan_semester');
});

Route::get('/komponen/gelar_depan', function () {
    return view('home.anggota.komponen.buat_gelar_depan');
});

Route::get('/lldikti/pendaftaranlldikti', function () {
    return view('home.anggota.lldikti.pendaftaran_lldikti');
})->name('pendaftaranlldikti');

Route::get('/auditor/pendaftaranauditor', function () {
    return view('home.anggota.auditor.pendaftaran_auditor');
})->name('pendaftaranauditor');

Route::get('/lldikti/editlldikti', function () {
    return view('home.anggota.lldikti.edit_lldikti');
})->name('editlldikti');

Route::get('/auditor/editauditor', function () {
    return view('home.anggota.auditor.edit_auditor');
})->name('edit_auditor');

Route::group(['middleware' => ['auth', 'role:1']], function () {

    Route::get('/lldikti/pendaftaran-admin', [SuperAdminController::class, 'createAdminLldikti'])->name('admin.lldikti.create');

    // Route untuk Admin
    Route::prefix('all_user')->group(function () { // admin
        Route::get('/data_all_user', [SuperAdminController::class, 'index'])->name('admin.index'); // /
        Route::get('/pendaftaran_all_user', [SuperAdminController::class, 'create'])->name('admin.create'); // /create
        Route::post('/', [SuperAdminController::class, 'store'])->name('admin.store'); // /
        Route::get('/{id}/sunting', [SuperAdminController::class, 'edit'])->name('admin.edit'); // /{id}/edit
        Route::put('/{id}', [SuperAdminController::class, 'update'])->name('admin.update'); // /{id}
    });


    Route::group(['prefix' => 'periode'], function () {
        //Periode
        Route::get('/buat_periode', [SuperAdminController::class, 'indexPeriode'])->name('index.periode');
        Route::post('/create', [SuperAdminController::class, 'CreatePeriode'])->name('periode.create');
        Route::get('/sunting/b_pe_s{id}', [SuperAdminController::class, 'editPeriode'])->name('periode.edit');
        Route::put('/update/{id}', [SuperAdminController::class, 'updatePeriode'])->name('periode.update');
    });
});

Route::group(['middleware' => ['auth', 'role:3|1']], function () {




    Route::group(['prefix' => 'komponen'], function () {
        Route::prefix('gelar')->group(function () {
            // Routes untuk Gelar Depan
            Route::get('/', [GelarController::class, 'index'])->name('gelar.index');

            Route::prefix('depan')->group(function () {
                Route::get('/', [GelarController::class, 'indexDepan'])->name('gelar-depan.merge');
                Route::get('/create', [GelarController::class, 'createDepan'])->name('gelar-depan.create');
                Route::post('/store', [GelarController::class, 'storeDepan'])->name('gelar-depan.store');
                Route::get('/{id}/edit', [GelarController::class, 'editDepan'])->name('gelar-depan.edit');
                Route::put('/{id}', [GelarController::class, 'updateDepan'])->name('gelar-depan.update');
            });

            // Routes untuk Gelar Belakang
            Route::prefix('belakang')->group(function () {
                Route::get('/', [GelarController::class, 'indexBelakang'])->name('gelar-belakang.merge');
                Route::get('/create', [GelarController::class, 'createBelakang'])->name('gelar-belakang.create');
                Route::post('/store', [GelarController::class, 'storeBelakang'])->name('gelar-belakang.store');
                Route::get('/{id}/edit', [GelarController::class, 'editBelakang'])->name('gelar-belakang.edit');
                Route::put('/{id}', [GelarController::class, 'updateBelakang'])->name('gelar-belakang.update');
            });
        });

        Route::group(['prefix' => 'kota'], function () {
            Route::get('/', [KotaController::class, 'index'])->name('kota.index'); // /
            Route::get('/buat', [KotaController::class, 'create'])->name('kota.create'); // /create
            Route::post('/', [KotaController::class, 'store'])->name('kota.store'); // /
            Route::get('/{kota}/sunting_k', [KotaController::class, 'edit'])->name('kota.edit'); // /{kota}/edit
            Route::put('/{kota}', [KotaController::class, 'update'])->name('kota.update'); // /{kota}
        });

        Route::group(['prefix' => 'jabatan_fungsional'], function () {
            Route::get('/', [JabatanFungsionalController::class, 'index'])->name('jabatan-fungsional.index');
            Route::get('/create', [JabatanFungsionalController::class, 'create'])->name('jabatan-fungsional.create');
            Route::post('/', [JabatanFungsionalController::class, 'store'])->name('jabatan-fungsional.store');
            Route::get('/{jabatanFungsional}/edit', [JabatanFungsionalController::class, 'edit'])->name('jabatan-fungsional.edit');
            Route::put('/{jabatanFungsional}', [JabatanFungsionalController::class, 'update'])->name('jabatan-fungsional.update');
        });

        Route::group(['prefix' => 'universitas'], function () {
            //Universitas
            Route::get('/buat_univ', [SuperAdminController::class, 'indexUniv'])->name('univ.index'); // /admin/createUniv
            Route::post('/create', [SuperAdminController::class, 'createUniv'])->name('univ.create'); // /univ/create
            Route::get('/sunting/b_u_s_{id}', [SuperAdminController::class, 'editUniv'])->name('univ.edit'); // /univ/edit/{id}
            Route::put('/update/{id}', [SuperAdminController::class, 'updateUniv'])->name('univ.update'); // /univ/update/{id}
        });

        Route::group(['prefix' => 'program_studi'], function () {
            //Prodi
            Route::get('/buat_prodi', [SuperAdminController::class, 'indexProdi'])->name('index.prodi'); // /admin/createProdi
            Route::post('/create', [SuperAdminController::class, 'createProdi'])->name('prodi.create'); // /prodi/create
            Route::get('/sunting/b_pr_s_{id}', [SuperAdminController::class, 'editProdi'])->name('prodi.edit'); // /prodi/edit/{id}
            Route::put('/update/{id}', [SuperAdminController::class, 'updateProdi'])->name('prodi.update'); // /prodi/update/{id}
        });

        Route::group(['prefix' => 'pangkat'], function () {
            //Pangkat
            Route::get('/buat_pangkat', [SuperAdminController::class, 'indexPangkatDosen'])->name('index.pangkat'); // /admin/createPangkat
            Route::post('/create', [SuperAdminController::class, 'createPangkat'])->name('pangkat.create'); // /pangkat/create
            Route::get('/sunting/b_pa_s_{id}', [SuperAdminController::class, 'editPangkat'])->name('pangkat.edit'); // /pangkat/edit/{id}
            Route::put('/update/{id}', [SuperAdminController::class, 'updatePangkat'])->name('pangkat.update'); // ('/pangkat/update/{id}
        });
    });
});

Route::group(['middleware' => ['auth', 'role:7|1']], function () {

    //OP PT or admin
    Route::get('/dosen/data_dosen_oppt', [OPPTController::class, 'allDosen'])->name('oppt.index.dosen'); // index/dosen
    Route::put('/status/dosen/{id}', [OPPTController::class, 'updateStatusDosen'])->name('oppt.updateStatus.dosen');
    Route::get('/dosen/data_dosen_oppt/e_d_d_o_{id}', [OPPTController::class, 'editDosen'])->name('oppt.edit.dosen'); // edit/dosen/{id}
    Route::put('/update/dosen/{id}', [OPPTController::class, 'updateDosen'])->name('oppt.update.dosen');
    Route::get('/periode', [OPPTController::class, 'indexPeriode'])->name('periode.index');
    Route::get('/dosen/data_dosen_oppt/h_d_d_o_{id}', [OPPTController::class, 'historyPengajuanDosen'])->name('oppt.history.dosen'); // history/dosen/{id}

    Route::get('/pengajuan/create', [OPPTController::class, 'addPengajuan'])->name('oppt.pengajuan.dosen');
    Route::post('/pengajuan/store', [OPPTController::class, 'ajukanDosen'])->name('oppt.ajukan.dosen');
    Route::get('/pengajuan/index', [OPPTController::class, 'indexPengajuan'])->name('oppt.pengajuanIndex.dosen');
    Route::get('/pengajuan/show/{id}', [OPPTController::class, 'showPengajuan'])->name('oppt.pengajuanShow.dosen');
    Route::post('/pengajuan/dokumen/store/{id}', [OPPTController::class, 'ajukanDokumen'])->name('oppt.pengajuanDokumenStore.dosen');
    Route::put('/pengajuan/dokumen/update/{id}', [OPPTController::class, 'updateDokumen'])->name('oppt.updateDokumen.dosen');
    Route::put('/draft/pengajuan{id}', [OPPTController::class, 'draftPengajuan'])->name('oppt.draftPengajuan.dosen');

    Route::put('/pengajuan/update/{id}', [OPPTController::class, 'updatePengajuan'])->name('oppt.updatePengajuan.dosen');
    Route::get('/pengajuan/edit/{id}', [OPPTController::class, 'editPengajuan'])->name('oppt.editPengajuan.dosen');
    Route::delete('/pengajuan/delete/{id}', [OPPTController::class, 'deletePengajuan'])->name('oppt.deletePengajuan.dosen');

    Route::get('/pengajuan/dosen/{id}', [OPPTController::class, 'statusPengajuanDosen'])->name('oppt.statusPengajuan.dosen');

    Route::get('/pengajuan/semester/show/{id}', [OPPTController::class, 'showPengajuanSemester'])->name('oppt.pengajuanSemesterShow.dosen');
    Route::post('/pengajuan/semester/store/', [OPPTController::class, 'ajukanDokumenSemester'])->name('oppt.pengajuanSemesterStore.dosen');

    Route::get('/template/{id}', [OPPTController::class, 'fetchDosen'])->name('fetch.dosen');

    //PDF
    Route::get('PDF/{id}', [PDFController::class, 'sptjmPDF'])->name('generate.pdf');

    Route::get('create/permohonan/dosen', [OPPTController::class, 'createPermohonan'])->name('oppt.createPermohonan.dosen');
    Route::post('store/permohonan/dosen', [OPPTController::class, 'storePermohonan'])->name('oppt.storePermohonan.dosen');
    Route::get('anggota/verif_edit_dosen_oppt', [OPPTController::class, 'indexPermohonan'])->name('oppt.indexPermohonan.dosen'); // index/permohonan/dosen
    Route::get('show/permohonan/dosen/{id}', [OPPTController::class, 'showPermohonan'])->name('oppt.showPermohonan.dosen');
    Route::get('/template/{id}', [OPPTController::class, 'fetchDosen'])->name('fetch.dosen');
});


Route::group(['middleware' => ['auth']], function () {
    // Profile Routes
    Route::get('/profil/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});


//Verifikator
Route::group(['middleware' => ['auth', 'role:2|1']], function () {
    Route::prefix('tunjangan')->group(function () {
        Route::get('/verif_tunjangan', [VerifikatorController::class, 'indexPengajuan'])->name('verifikator.pengajuan.index'); // index/pengajuan
        Route::get('/verif_tunjangan/v_t_{id}', [VerifikatorController::class, 'detailPengajuan'])->name('verifikator.pengajuan.show'); // detail/pengajuan/{id}
        Route::put('/update/pengajuan/{id}', [VerifikatorController::class, 'updateStatusPengajuan'])->name('verifikator.pengajuanStatus.update');
        Route::post('/store/pesan/pengajuan/{id}', [VerifikatorController::class, 'storePesanPengajuanDosen'])->name('verifikator.pesanPengajuan.store');
    });
});

Route::get('/anggota/verif_edit_dosen', [VerifikatorController::class, 'indexPermohonan'])->name('verifikator.permohonan.index'); // verifikator/index/permohonan
Route::get('/anggota/verif_edit_dosen/d_e_d_{id}', [VerifikatorController::class, 'showPermohonan'])->name('verifikator.permohonan.show'); // verifikator/index/permohonan/{id}
Route::put('/anggota/dosenstatus/{id}', [VerifikatorController::class, 'statusPermohonan'])->name('verifikator.permohonan.status'); // verifikator/index/permohonan/status/{id}

//Tes Api
Route::get('/userProfile', [AuthApiController::class, 'userProfile']);
Route::get('/pengajuan', [AuthApiController::class, 'pengajuan']);
Route::get('/auditor', [AuthApiController::class, 'auditor']);


//Informasi dipake oleh admin
Route::group(['prefix' => 'informasi'], function () {
    Route::get('index', [InformasiController::class, 'indexInformasi'])->name('admin.informasi.index');
    Route::post('store', [InformasiController::class, 'storeInformasi'])->name('admin.informasi.store');
    Route::get('edit/{id}', [InformasiController::class, 'editInformasi'])->name('admin.informasi.edit');
    Route::put('update/{id}', [InformasiController::class, 'updateInformasi'])->name('admin.informasi.update');
    Route::delete('delete/{id}', [InformasiController::class, 'deleteInformasi'])->name('admin.informasi.delete');
});

//Faq dipake oleh admin
Route::group(['prefix' => 'faq'], function () {
    Route::get('index', [FaqController::class, 'index'])->name('admin.faq.index');
    Route::post('store', [FaqController::class, 'store'])->name('admin.faq.store');
    Route::get('edit/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
    Route::put('update/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
    Route::delete('delete/{id}', [FaqController::class, 'destroy'])->name('admin.faq.delete');
});


Route::group(['prefix' => 'lldikti'], function () {
    Route::get('/all-lldikti', [SuperAdminController::class, 'allLldikti'])->name('super.lldikti.all');
});

Route::group(['prefix' => 'operator'], function () {
    Route::get('/all-operator', [SuperAdminController::class, 'allOperator'])->name('super.operator.all');
    Route::get('/pendaftaranoppt', [SuperAdminController::class, 'createOperator'])->name('super.operator.create');
});

Route::group(['prefix' => 'auditor'], function () {
    Route::get('/all-auditor', [SuperAdminController::class, 'allAuditor'])->name('super.auditor.all');
    Route::get('/create/auditor', [SuperAdminController::class, 'createAuditor'])->name('super.auditor.create');
});
