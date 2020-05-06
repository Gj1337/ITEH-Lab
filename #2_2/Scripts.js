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

function Task1()
{
    let select=document.getElementById("getInfo");
    ajax.open('POST',"SelectionTask1.php",true);
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
    ajax.send('media='+ select.value);
    SaveRezult();
}

function Task2()
{
    let select=document.getElementById("getInfo");
    ajax.open('POST',"SelectionTask2.php",true);
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
    ajax.send('actor='+ select.value);
    SaveRezult();
}

function Task3()
{
    let select=document.getElementById("getInfo");
    ajax.open('POST',"SelectionTask3.php",true);
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
    ajax.send('year='+ select.value);
    SaveRezult();
}

function SaveRezult()
{   
    let select=document.getElementById("getInfo");
    setTimeout(function () {window.localStorage.setItem(select.value,document.getElementById('body').innerHTML);   },100);
    
}

function GetRezult()
{
    document.getElementById("body").innerHTML=window.localStorage.getItem(document.getElementById("getInfo").value);
}