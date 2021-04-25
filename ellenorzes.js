function formvalidation()
{
    /*var f1=document.forms['felvetel']['f_nev'].value;
    var f2=document.forms['felvetel']['sz_nev'].value;
    var f3=document.forms['felvetel']['datum'].value;
    var f4=document.forms['felvetel']['szel'].value;
    var f5=document.forms['felvetel']['mag'].value;
    var f6=document.forms['felvetel']['mas'].value;*/

    var t1=document.getElementById('f_nev').value;
    var t2=document.getElementById('sz_nev').value;
    var t3=document.getElementById('datum').value;
    var t4=document.getElementById('szel').value;
    var t5=document.getElementById('mag').value;
    var t6=document.getElementById('mas').value;

    if(t1=="" || t2=="" || !t3 || t4=="" || t5=="" || t6=="")
    {
        alert("Töltse ki az üres mezőket!");
        return false;
    }
    else
    {
        alert('Sikeres felvétel!');
        return true;
    }
    
}