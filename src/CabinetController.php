<?php

namespace b2bmodules\cabinetAllocation;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
//use Redirect;
use Sentinel;
use View;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Response;
use models\OffsiteBackup;
use models\CabinetInterface;
use models\CabinetFirewall;
use models\CabinetVPN;
use Amodelspp\CabinetLicence;
use models\CabinetAdminAccount;
use models\CabinetThreeCX;
use models\Cabinet;

class CabinetController extends Controller
{

    public function index()
    {
        // Show the page
        return view('cabinet::index');
    }

    public function offsiteBackup()
    {
        return view('cabinet::offsiteBackup');
    } 

    public function interface()
    {
        return view('cabinet::interface');
    }

    public function firewall()
    {
        return view('cabinet::firewall');
    }

    public function vpn()
    {
        return view('cabinet::vpn');
    }

    public function licence()
    {
        return view('cabinet::licence');
    }

    public function threeCX()
    {
        return view('cabinet::threeCX');
    }

    public function adminAccount()
    {
        return view('cabinet::adminAccount');
    }

    public function cabinet()
    {
        return view('cabinet::cabinet');
    }


    //Offsite module
    public function offsiteBackupData()
    {
        $offsiteData = OffsiteBackup::all();

        return DataTables::of($offsiteData)
                ->addColumn('actions', function(OffsiteBackup $offsite) {
                    $actions = '<a  href="'. route('offsiteBackup.edit', $offsite->id) .'"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Update Backup"></i></a>';
                            return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
    }

    public function offsiteBackupCreate()
    {
        return view('cabinet::offsiteBackupCreate');
    }

    public function offsiteBackupStore(Request $request)
    {
        $backup = new OffsiteBackup();
        $backup->fill($request->all());
        $backup->save();

        return redirect()->route('cabinet::offsiteBackup');
    }

    public function offsiteBackupEdit($id)
    {
        $backup = OffsiteBackup::find($id);

        return view('cabinet::offsiteBackupEdit')->withBackup($backup);
    }

    public function offsiteBackupUpdate(Request $request, $id)
    {
        $backup = OffsiteBackup::find($id);
        $backup->fill($request->all());
        $backup->save();

        return redirect()->route('cabinet::offsiteBackup');
    }

    //interface
    public function interfaceData()
    {
        $interfaceData = CabinetInterface::all();

        return DataTables::of($interfaceData)
                ->addColumn('actions', function(CabinetInterface $interface) {
                    $actions = '<a  href="'. route('interface.edit', $interface->id) .'"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Update interface"></i></a>';
                            return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
    }

    public function interfaceCreate()
    {
        return view('cabinet::interfaceCreate');
    }

    public function interfaceStore(Request $request)
    {
        $interface = new CabinetInterface();
        $interface->fill($request->all());
        $interface->save();

        return redirect()->route('cabinet::interface');
    }

    public function interfaceEdit($id)
    {
        $interface = CabinetInterface::find($id);
        
        return view('cabinet::interfaceEdit')->withinterface($interface);
    }

    public function interfaceUpdate(Request $request, $id)
    {
        $interface = CabinetInterface::find($id);
        $interface->fill($request->all());
        $interface->save();

        return redirect()->route('cabinet::interface');
    }


    //firewall
    public function firewallData()
    {
        $firewallData = CabinetFirewall::all();

        return DataTables::of($firewallData)
                ->addColumn('actions', function(CabinetFirewall $firewall) {
                    $actions = '<a  href="'. route('firewall.edit', $firewall->id) .'"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Update firewall"></i></a>';
                            return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
    }

    public function firewallCreate()
    {
        return view('cabinet::firewallCreate');
    }

    public function firewallStore(Request $request)
    {
        $firewall = new CabinetFirewall();
        $firewall->fill($request->all());
        $firewall->save();

        return redirect()->route('cabinet::firewall');
    }

    public function firewallEdit($id)
    {
        $firewall = CabinetFirewall::find($id);
        
        return view('cabinet::firewallEdit')->withfirewall($firewall);
    }

    public function firewallUpdate(Request $request, $id)
    {
        $firewall = CabinetFirewall::find($id);
        $firewall->fill($request->all());
        $firewall->save();

        return redirect()->route('cabinet::firewall');
    }


    //vpn
    public function vpnData()
    {
        $vpnData = CabinetVPN::all();

        return DataTables::of($vpnData)
                ->addColumn('actions', function(CabinetVPN $vpn) {
                    $actions = '<a  href="'. route('vpn.edit', $vpn->id) .'"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Update vpn"></i></a>';
                            return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
    }

    public function vpnCreate()
    {
        return view('cabinet::vpnCreate');
    }

    public function vpnStore(Request $request)
    {
        $vpn = new CabinetVPN();
        $vpn->fill($request->all());
        $vpn->save();

        return redirect()->route('cabinet::vpn');
    }

    public function vpnEdit($id)
    {
        $vpn = CabinetVPN::find($id);
        
        return view('cabinet::vpnEdit')->withvpn($vpn);
    }

    public function vpnUpdate(Request $request, $id)
    {
        $vpn = CabinetVPN::find($id);
        $vpn->fill($request->all());
        $vpn->save();

        return redirect()->route('cabinet::vpn');
    }

    //licence
    public function licenceData()
    {
        $licenceData = CabinetLicence::all();

        return DataTables::of($licenceData)
                ->addColumn('actions', function(CabinetLicence $licence) {
                    $actions = '<a  href="'. route('licence.edit', $licence->id) .'"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Update licence"></i></a>';
                            return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
    }

    public function licenceCreate()
    {
        return view('cabinet::licenceCreate');
    }

    public function licenceStore(Request $request)
    {
        $licence = new CabinetLicence();
        $licence->fill($request->all());
        $licence->save();

        return redirect()->route('cabinet::licence');
    }

    public function licenceEdit($id)
    {
        $licence = CabinetLicence::find($id);
        
        return view('cabinet::licenceEdit')->withlicence($licence);
    }

    public function licenceUpdate(Request $request, $id)
    {
        $licence = CabinetLicence::find($id);
        $licence->fill($request->all());
        $licence->save();

        return redirect()->route('cabinet::licence');
    }

    
    //adminAccount
    public function adminAccountData()
    {
        $adminAccountData = CabinetAdminAccount::all();

        return DataTables::of($adminAccountData)
                ->addColumn('actions', function(CabinetAdminAccount $adminAccount) {
                    $actions = '<a  href="'. route('adminAccount.edit', $adminAccount->id) .'"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Update adminAccount"></i></a>';
                            return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
    }

    public function adminAccountCreate()
    {
        return view('cabinet::adminAccountCreate');
    }

    public function adminAccountStore(Request $request)
    {
        $adminAccount = new CabinetAdminAccount();
        $adminAccount->fill($request->all());
        $adminAccount->save();

        return redirect()->route('cabinet::adminAccount');
    }

    public function adminAccountEdit($id)
    {
        $adminAccount = CabinetAdminAccount::find($id);
        
        return view('cabinet::adminAccountEdit')->withadminAccount($adminAccount);
    }

    public function adminAccountUpdate(Request $request, $id)
    {
        $adminAccount = CabinetAdminAccount::find($id);
        $adminAccount->fill($request->all());
        $adminAccount->save();

        return redirect()->route('cabinet::adminAccount');
    }

     //3CX
     public function threeCXData()
     {
         $threeCXData = CabinetThreeCX::all();
 
         return DataTables::of($threeCXData)
                 ->addColumn('actions', function(CabinetthreeCX $threeCX) {
                     $actions = '<a  href="'. route('threeCX.edit', $threeCX->id) .'"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Update threeCX"></i></a>';
                             return $actions;
                 })
                 ->rawColumns(['actions'])
                 ->make(true);
     }
 
     public function threeCXCreate()
     {
         return view('cabinet::threeCXCreate');
     }
 
     public function threeCXStore(Request $request)
     {
         $threeCX = new CabinetThreeCX();
         $threeCX->fill($request->all());
         $threeCX->save();
 
         return redirect()->route('cabinet::threeCX');
     }
 
     public function threeCXEdit($id)
     {
         $threeCX = CabinetThreeCX::find($id);
         
         return view('cabinet::threeCXEdit')->withthreeCX($threeCX);
     }
 
     public function threeCXUpdate(Request $request, $id)
     {
         $threeCX = CabinetThreeCX::find($id);
         $threeCX->fill($request->all());
         $threeCX->save();
 
         return redirect()->route('cabinet::threeCX');
     }
 
     //cabinet
     public function cabinetData()
     {
         $cabinetData = Cabinet::all();
 
         return DataTables::of($cabinetData)
                 ->addColumn('actions', function(Cabinet $cabinet) {
                     $actions = '<a  href="'. route('cabinet::edit', $cabinet->id) .'"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Update cabinet"></i></a>';
                             return $actions;
                 })
                 ->rawColumns(['actions'])
                 ->make(true);
     }
 
     public function cabinetCreate()
     {
         return view('cabinet::cabinetCreate');
     }
 
     public function cabinetStore(Request $request)
     {
         $cabinet = new Cabinet();
         $cabinet->fill($request->all());
         $cabinet->save();
 
         return redirect()->route('cabinet::cabinet');
     }
 
     public function cabinetEdit($id)
     {
         $cabinet = Cabinet::find($id);
         
         return view('cabinet::cabinetEdit')->withcabinet($cabinet);
     }
 
     public function cabinetUpdate(Request $request, $id)
     {
         $cabinet = Cabinet::find($id);
         $cabinet->fill($request->all());
         $cabinet->save();
 
         return redirect()->route('cabinet::cabinet');
     }
 

}