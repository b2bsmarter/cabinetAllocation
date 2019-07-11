<?php 
Route::get('calculator', function(){
	echo 'Hello from the calculator package!';
});
Route::group(['prefix' => 'cabinet'], function () {
    //offsite backup
    Route::get('offsiteBackup', 'CabinetController@offsiteBackup')->name('cabinet.offsiteBackup');
    Route::get('offsiteBackup/data', 'CabinetController@offsiteBackupData')->name('offsiteBackup.data');
    Route::get('offsiteBackup/create', 'CabinetController@offsiteBackupCreate')->name('offsiteBackup.create');
    Route::get('offsiteBackup/{offsitebackup}/edit', 'CabinetController@offsiteBackupEdit')->name('offsiteBackup.edit');
    Route::post('offsiteBackup/store', 'CabinetController@offsiteBackupStore')->name('offsiteBackup.store');
    Route::post('offsiteBackup/{offsitebackup}/update', 'CabinetController@offsiteBackupUpdate')->name('offsiteBackup.update');

    //interface
    Route::get('interface', 'CabinetController@interface')->name('cabinet.interface');
    Route::get('interface/data', 'CabinetController@interfaceData')->name('interface.data');
    Route::get('interface/create', 'CabinetController@interfaceCreate')->name('interface.create');
    Route::get('interface/{interface}/edit', 'CabinetController@interfaceEdit')->name('interface.edit');
    Route::post('interface/store', 'CabinetController@interfaceStore')->name('interface.store');
    Route::post('interface/{interface}/update', 'CabinetController@interfaceUpdate')->name('interface.update');

    //firewall
    Route::get('firewall', 'CabinetController@firewall')->name('cabinet.firewall');
    Route::get('firewall/data', 'CabinetController@firewallData')->name('firewall.data');
    Route::get('firewall/create', 'CabinetController@firewallCreate')->name('firewall.create');
    Route::get('firewall/{firewall}/edit', 'CabinetController@firewallEdit')->name('firewall.edit');
    Route::post('firewall/store', 'CabinetController@firewallStore')->name('firewall.store');
    Route::post('firewall/{firewall}/update', 'CabinetController@firewallUpdate')->name('firewall.update');

    //vpn
    Route::get('vpn', 'CabinetController@vpn')->name('cabinet.vpn');
    Route::get('vpn/data', 'CabinetController@vpnData')->name('vpn.data');
    Route::get('vpn/create', 'CabinetController@vpnCreate')->name('vpn.create');
    Route::get('vpn/{vpn}/edit', 'CabinetController@vpnEdit')->name('vpn.edit');
    Route::post('vpn/store', 'CabinetController@vpnStore')->name('vpn.store');
    Route::post('vpn/{vpn}/update', 'CabinetController@vpnUpdate')->name('vpn.update');

    //licence
    Route::get('licence', 'CabinetController@licence')->name('cabinet.licence');
    Route::get('licence/data', 'CabinetController@licenceData')->name('licence.data');
    Route::get('licence/create', 'CabinetController@licenceCreate')->name('licence.create');
    Route::get('licence/{licence}/edit', 'CabinetController@licenceEdit')->name('licence.edit');
    Route::post('licence/store', 'CabinetController@licenceStore')->name('licence.store');
    Route::post('licence/{licence}/update', 'CabinetController@licenceUpdate')->name('licence.update');

    //admin account
    Route::get('adminAccount', 'CabinetController@adminAccount')->name('cabinet.adminAccount');
    Route::get('adminAccount/data', 'CabinetController@adminAccountData')->name('adminAccount.data');
    Route::get('adminAccount/create', 'CabinetController@adminAccountCreate')->name('adminAccount.create');
    Route::get('adminAccount/{adminAccount}/edit', 'CabinetController@adminAccountEdit')->name('adminAccount.edit');
    Route::post('adminAccount/store', 'CabinetController@adminAccountStore')->name('adminAccount.store');
    Route::post('adminAccount/{adminAccount}/update', 'CabinetController@adminAccountUpdate')->name('adminAccount.update');

    //3CX
    Route::get('threeCX', 'CabinetController@threeCX')->name('cabinet.threeCX');
    Route::get('threeCX/data', 'CabinetController@threeCXData')->name('threeCX.data');
    Route::get('threeCX/create', 'CabinetController@threeCXCreate')->name('threeCX.create');
    Route::get('threeCX/{threeCX}/edit', 'CabinetController@threeCXEdit')->name('threeCX.edit');
    Route::post('threeCX/store', 'CabinetController@threeCXStore')->name('threeCX.store');
    Route::post('threeCX/{threeCX}/update', 'CabinetController@threeCXUpdate')->name('threeCX.update');

    //cabinet
    Route::get('cabinet', 'CabinetController@cabinet')->name('cabinet.cabinet');
    Route::get('cabinet/data', 'CabinetController@cabinetData')->name('cabinet.data');
    Route::get('cabinet/create', 'CabinetController@cabinetCreate')->name('cabinet.create');
    Route::get('cabinet/{cabinet}/edit', 'CabinetController@cabinetEdit')->name('cabinet.edit');
    Route::post('cabinet/store', 'CabinetController@cabinetStore')->name('cabinet.store');
    Route::post('cabinet/{cabinet}/update', 'CabinetController@cabinetUpdate')->name('cabinet.update');
});
?>