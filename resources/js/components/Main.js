import DashClient from "./pages/clients/DashboardClient";
import PenanggungJawab from './pages/clients/PenanggungJawab';
import Alert from '../scripts/Alert';
import Walikota from './pages/kasubag_root/Walikota';
import RegisterDokumen from './pages/clients/RegisterDokumen';
import OpDashboard from './pages/operator/OpDashboard';
import KbDashboard from './pages/kasubag_root/KbDashboard';
import MainArsip from './pages/operator/arsip/MainArsip';



export default class MainRouter{
    dashboardClient=new DashClient();
    penanggungJawab=new PenanggungJawab();
    walikota=new Walikota();
    regDokumen = new RegisterDokumen();
    opDash = new OpDashboard();
    kbDash = new KbDashboard();
    arsip = new MainArsip();
    logout(){
        const alert = new Alert();
        alert.swalYesNo("Ingin keluar dari Aplikasi?",'Logout',()=>{
            $("#logout-form").submit();
        })
    }
}