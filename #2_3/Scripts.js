var ajax;
InitAjax();

function InitAjax() 
{
    try /* пробуем создать компонент XMLHTTP для IE старых версий */
    {ajax = new ActiveXObject("Microsoft.XMLHTTP");}
    catch (e) 
    {
        try //XMLHTTP для IE версий >6
        {ajax = new ActiveXObject("Msxml2.XMLHTTP");} 
        catch (e) 
        {
            try // XMLHTTP для Mozilla и остальных
            {ajax = new XMLHttpRequest();} 
            catch(e)
            { ajax = 0; }
        }
    }
}

function SelectionTask1HTML()
{
    var select = document.getElementById("genre");
    ajax.open('POST',"Selection/SelectionTask1HTML.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() 
    {console.dir(ajax);
        if (ajax.readyState == 4) 
        {
            if(ajax.status == 200) 
            {
                document.getElementById("body").innerHTML=ajax.responseText;
            } 
        }
    };
    ajax.send('genre='+ select.value);
}


function SelectionTask2XML()
{
    var select = document.getElementById('actor');
    //alert( select.value);
    ajax.open('POST',"Selection/SelectionTask2XML.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() 
    {
        if (ajax.readyState == 4) 
        {
            if(ajax.status == 200) 
            {console.dir(ajax);

                var result = ajax.responseXML.firstChild.children;
                var table= '<br><table border="1">'+
                '<td align="center" colspan=9><big>'+
                '<b>'+select.value+'<big></td>';
                table=table+'<tr>'+
                '<td><b>Название</td>'+
                '<td><b>Качество</td>'+
                '<td><b>Дата выхода</td>'+
                ' <td><b>Страна</td>'+
                '<td><b>Оценка</td>'+
                '<td><b>Пролюсер</td>'+
                '<td><b>Режисер</td>'+
                '<td><b>Кодек</td>'+
                '<td><b>Носитель</td>'+
                '</tr>';
                for(var i=0;i<result.length;i++)
                {
                    table=table+'<tr>'+
                    '<td>'+result[i].children[0].innerHTML+'</td>'+
                    '<td>'+result[i].children[1].innerHTML+'</td>'+
                    '<td>'+result[i].children[2].innerHTML+'</td>'+
                    '<td>'+result[i].children[3].innerHTML+'</td>'+
                    '<td>'+result[i].children[4].innerHTML+'</td>'+
                    '<td>'+result[i].children[5].innerHTML+'</td>'+
                    '<td>'+result[i].children[6].innerHTML+'</td>'+
                    '<td>'+result[i].children[7].innerHTML+'</td>'+
                    '<td>'+result[i].children[8].innerHTML+'</td>'+
                    '</tr>'
                }
                console.log(result.length);
               // console.log(result[i].children);
                console.log(table);
                document.getElementById("body").innerHTML=table;
            } 
        }
    };
    ajax.send('actor='+ select.value);
}

function SelectionTask3JSON()
{
    var startDate = document.getElementById('startDate');
    var endDate   = document.getElementById('endDate');

    ajax.open('POST',"Selection/SelectionTask3JSON.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() 
    {
        if (ajax.readyState == 4) 
        {
            if(ajax.status == 200) 
            {console.dir(ajax);
                var result= JSON.parse(ajax.responseText);
                console.log(result);

                var ifStartDateUndef="";
                if((startDate.value.length)==0){ifStartDateUndef="1888-01-01";}
                else{ifStartDateUndef=startDate.value;}

                var table = '<br><table border="1">'+
                '<td align="center" colspan=9><big>'+
                '<b>Филмы c '+ ifStartDateUndef+'  по  '+endDate.value+' <big></td>';

                table=table+'<tr>'+
                '<td><b>Название</td>'+
                '<td><b>Качество</td>'+
                '<td><b>Дата выхода</td>'+
                ' <td><b>Страна</td>'+
                '<td><b>Оценка</td>'+
                '<td><b>Пролюсер</td>'+
                '<td><b>Режисер</td>'+
                '<td><b>Кодек</td>'+
                '<td><b>Носитель</td>'+
                '</tr>';

                for(var i=0; i<result.length;i++)
                {
                    table=table+'<tr>'+
                    '<td>'+result[i].name+'</td>'+
                    '<td>'+result[i].resolution+'</td>'+
                    '<td>'+result[i].theDate+'</td>'+
                    '<td>'+result[i].country+'</td>'+
                    '<td>'+result[i].quality+'</td>'+
                    '<td>'+result[i].producer+'</td>'+
                    '<td>'+result[i].director+'</td>'+
                    '<td>'+result[i].codec+'</td>'+
                    '<td>'+result[i].carrier+'</td>'+
                    '</tr>'
                }
                document.getElementById("body").innerHTML=table;

            } 

        }
    };
    ajax.send('startDate='+ startDate.value + '&endDate='+endDate.value);
}

