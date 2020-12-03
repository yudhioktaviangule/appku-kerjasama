import DashClient from "./pages/clients/DashboardClient";
import PenanggungJawab from './pages/clients/PenanggungJawab';



export default class MainRouter{
    dashboardClient=new DashClient();
    penanggungJawab=new PenanggungJawab();
}