<?php

namespace App\Includes;

trait JSFactory{
    public function redirectBack($message,$title,$route)
    {
        echo "
        <link rel='stylesheet' href='".asset('css/app.css')."'>
        <script src='".asset('dist/plugins/jquery/jquery.min.js')."'></script>
        <script src='".asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js')."'></script>
        <script src='".asset('dist/plugins/datatables/jquery.dataTables.js')."'></script>
        <script src='".asset('dist/plugins/datatables-bs4/js/dataTables.bootstrap4.js')."'></script>
            <script src='".asset('js/app.js')."'></script>
            <script>
                $(document).ready(()=>{
                    window.swals.swAlert('".$message."','{$title}',()=>{
                        window.location.href='".$route."'
                        });


                })
            </script>
        ";
    }
}