$(document).ready(function (){

    function msg (msg) {
        var msg_span=document.getElementById('alert_msg');
        msg_span.innerHTML=msg;
        $( "#alert_unit" ).fadeIn("fast");
    }

     $('#alert_close').click(function () {
        $( "#alert_unit" ).fadeOut("fast");
    });

    $('#new_migrate').submit(function () {
        $.post(projectRoute+'/new_migration',$('#new_migrate').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#exec_last_migrate').submit(function () {
        $.post(projectRoute+'/exec_migration',$('#formf2').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#rollback_last_migrate').submit(function () {
        $.post(projectRoute+'rollback_migration',$('#formf3').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#exec_cos_migrate').submit(function () {
        $.post(projectRoute+'/exec_cos_migration',$('#exec_cos_migrate').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#rollback_cos_migrate').submit(function () {
        $.post(projectRoute+'/rollback_cos_migration',$('#exec_cos_migrate').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#new_link').submit(function () {
        $.post(projectRoute+'/new_link',$('#new_link').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#new_seed').submit(function () {
        $.post(projectRoute+'/new_seed',$('#new_seed').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#run_seed').submit(function () {
        $.post(projectRoute+'/exec_seed',$('#run_seed').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#new_lang_dir').submit(function () {
        $.post(projectRoute+'/new_dir_lang',$('#new_lang_dir').serialize(),function(data)
            {
                msg(data);
                if(data=="okey") $('#new_lang_dir').reset();
            });
        //
        return false;
    });

    $('#new_lang_file').submit(function () {
        if(document.getElementById('lang_file_name').value!="")
        {
            $.post(projectRoute+'/new_lang_file',$('#new_lang_file').serialize(),function(data)
            {
                msg(data);
            });
        }
        else
        {
            msg('vous devez ajouter le nom de fichier');
        }
        
        //
        return false;
    });

    $('#new_models').submit(function () {
        $.post(projectRoute+'/new_model',$('#new_models').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#new_view').submit(function () {
        $.post(projectRoute+'/new_view',$('#new_view').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });

    $('#new_controller').submit(function () {
        $.post(projectRoute+'/new_controller',$('#new_controller').serialize(),function(data)
            {
                msg(data);
            });
        //
        return false;
    });
});