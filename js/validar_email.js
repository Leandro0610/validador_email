var condicoesEspeciais = ['hotmal','gmeil','hotmeil']; // Adicionar aqui o que não pode aparecer nos e-mails.
var patt = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/gi;
var numEmailsInvalidos = 0;
var emailsInvalidos = '';
emailsValidos = [];

for (var i=0; i<emails.length; i++) {
    var result = emails[i]['email'].match(patt);
    
    for (var j=0; j<condicoesEspeciais.length; j++) {
        if (emails[i]['email'].match(condicoesEspeciais[j]))
        result = false;
    }
    
    if(result) {
        var tbody = document.getElementById('tbody');
        var tr = document.createElement('tr');
        var td = document.createElement('td');
        var texto = document.createTextNode(emails[i]['email']);
        td.appendChild(texto);
        tr.appendChild(td);
        tbody.appendChild(tr);    
    }
    else {
        numEmailsInvalidos ++;
        var containerEmailsInvalidos = document.getElementById('emailsInvalidos');
        var texto = document.createTextNode(emails[i]['email']);
        var br = document.createElement('br');
        containerEmailsInvalidos.appendChild(texto);
        containerEmailsInvalidos.appendChild(br);
    }
}

if (numEmailsInvalidos > 0) {
    var emailsRemovidos = document.getElementById('emailsRemovidos');
    var numeroEmailInvalidos = document.getElementById('numeroEmailInvalidos');
    var texto = document.createTextNode(numEmailsInvalidos);
    numeroEmailInvalidos.appendChild(texto);
    emailsRemovidos.style.display = 'block';
}

function downloadCSV(csv, filename) {
    
    var csvFile;
    var downloadLink;
    csvFile = new Blob([csv], {type: "text/csv"});
    downloadLink = document.createElement("a");
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}

var dropdownIconDown = document.getElementById('dropdown_icon_down');
dropdownIconDown.addEventListener('click', showEmailsInvalidos);

function showEmailsInvalidos() {
    
    var dropdownIconDown = document.getElementById('dropdown_icon_down');
    var dropdownIconUp = document.getElementById('dropdown_icon_up');
    var containerEmailsInvalidos = document.getElementById('emailsInvalidos');
    dropdownIconUp.style.display = 'block';
    dropdownIconDown.style.display = 'none';
    containerEmailsInvalidos.style.display = 'block';
}

var dropdownIconUp = document.getElementById('dropdown_icon_up');
dropdownIconUp.addEventListener('click', hideEmailsInvalidos);

function hideEmailsInvalidos() {
    
    var dropdownIconDown = document.getElementById('dropdown_icon_down');
    var dropdownIconUp = document.getElementById('dropdown_icon_up');
    var containerEmailsInvalidos = document.getElementById('emailsInvalidos');
    dropdownIconUp.style.display = 'none';
    dropdownIconDown.style.display = 'block';
    containerEmailsInvalidos.style.display = 'none';
}

var btnExport = document.getElementById('btnExport');
btnExport.addEventListener('click', exportTableToCSV);

function exportTableToCSV() {
    
    filename = 'emails_validos.csv';
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        csv.push(row.join(","));        
    }
    downloadCSV(csv.join("\n"), filename);
}