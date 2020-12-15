import DashClient from "./pages/clients/DashboardClient";
import PenanggungJawab from './pages/clients/PenanggungJawab';
import Alert from '../scripts/Alert';
import Walikota from './pages/kasubag_root/Walikota';

import Operator from './pages/operator/operator';
import Klien from './pages/clients/Klien';



export default class MainRouter{
    dashboardClient=new DashClient();
    penanggungJawab=new PenanggungJawab();
    walikota=new Walikota();
    Client = new Klien();
    operator = new Operator();
    logout(){
        const alert = new Alert();
        alert.swalYesNo("Ingin keluar dari Aplikasi?",'Logout',()=>{
            $("#logout-form").submit();
        })
    }
}