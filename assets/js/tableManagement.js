$(document).ready(function(){
    $(".deptBtn").click(function(){
        $('.table-title').text("LIST OF DEPARTMENT");
        $.ajax({
            url: 'users/loadDeptTable',
            type:'GET',
            success:function(response)
            {
                $('.container-btn').html(response.addBtn);
                $("thead").html(response.thead);
                $("tbody").html(response.tbody);
            },
            error: function(xhr,status,error)
            {
                alert(xhr.respnseText);
            }
        });
    });
  });

  $(".userBtn").click(function(){
     $('.table-title').text("LIST OF USERS");
     $.ajax({
        url: 'users/loadUserTable',
        type:'GET',
        success:function(response)
        {
            $('.container-btn').html(response.addBtn);
            $("thead").html(response.thead);
            $("tbody").html(response.tbody);
            location.reload();
        },
        error: function(xhr,status,error)
        {
            alert(xhr.respnseText);
        }
    });
  });

  $(".usersBtn").click(function(){
    $.ajax({
        url: 'users/loadUserTable',
        type:'GET',
        success:function(response)
        {
            $('.container-btn').html(response.addBtn);
            $("thead").html(response.thead);
            $("tbody").html(response.tbody);
        },
        error: function(xhr,status,error)
        {
            alert(xhr.respnseText);
        }
    });
  });

  $(".postBtn").click(function(){
    $('.table-title').text("LIST OF POSITION");
    $.ajax({
       url: 'users/loadPositionTable',
       type:'GET',
       success:function(response)
       {
           $('.container-btn').html(response.addBtn);
           $("thead").html(response.thead);
           $("tbody").html(response.tbody);
       },
       error: function(xhr,status,error)
       {
           alert(xhr.respnseText);
       }
   });
 });
