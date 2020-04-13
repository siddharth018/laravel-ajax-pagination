<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 AJAX Pagination Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
  
<body>
<div class="container">
<div class="row">
    <select class="username" id="username">
            <option value="Sid">Sid</option>
            <option value="sundar">sundar</option>
            <option value="Chotu">Chotu</option>
        </select>
        <select class="city" id="city">
            <option value="noida">noida</option>
            <option value="gurgaon">gurgaon</option>
            <option value="delhi">delhi</option>
        </select>  
</div>
    <div id="tag_container">
           @include('presult')
    </div>
</div>

<script>
$(document).ready(function(){
    $("select").change(function(){
    var city = '', tempArray = [];
    var city = $( "#city" ).val();
    var username = $( "#username" ).val();
    var url = document.URL;
    pagination = window.history.pushState("", "",'ajax-pagination?username='+username+'&city='+city);
    getDataSearch(city,username);
    // console.log('ajax-pagination?username='+username+'&city='+city);
     });
});
</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            // pagination = window.history.pushState("", "", myurl);
        // alert(page);
            var url_string = location.href;  
            var url = new URL(url_string);
            var username = url.searchParams.get("username");
            var city = url.searchParams.get("city");
            
            // getData(page);
            getData(page,username,city);
            
        });
    });
      
    // function getData(page){
       
    function getData(page,username,city){
        $.ajax(
        {
            url: '?page=' + page + '&username='+ username + '&city=' + city,
            // url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            // location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
    function getDataSearch(city,username){
        $.ajax(
        {
            url: '?username=' + username + '&city=' + city,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
</body>
</html>