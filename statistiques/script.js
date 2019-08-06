/****************************************
Fichier : script.js
Auteur : William Gonin
Fonctionnalité : Fichier javascript pour faire fonctionner les tabulators
Date : 2019-04-23

Vérification :
Date                  Nom                       Approuvé
2019-05-03           Guillaume                  Approuvé
2019-05-03						Karl											Oui
2019-05-03						Maxime										Approuvé
=========================================================

Historique de modifications :
Date                  Nom                     Description
=========================================================

****************************************/

 //create Tabulator on DOM element with id "example-table"
var table = new Tabulator("#example-table", {
	//data:tabledata,           //load row data from array
	placeholder:"No Data Set",
	layout:"fitColumns",      //fit columns to width of table
	responsiveLayout:"hide",  //hide columns that dont fit on the table
	ajaxContentType:"json",
	initialSort:[             //set the initial sort order of the data
		{column:"nom", dir:"asc"},
	],
 	columns:[ //Define Table Columns
		{title:"Nom du forfait", field:"nom", editor:"input"},
		{title:"Nombre d'abonnée", field:"nb", align:"center", editor:"input"},
		{title:"Popularité", field:"popularitee", align:"left", formatter:"progress"}
 	],
});

//create Tabulator on DOM element with id "example-table"
var table1 = new Tabulator("#example-table1", {
 //data:tabledata,           //load row data from array
 placeholder:"No Data Set",
 layout:"fitColumns",      //fit columns to width of table
 responsiveLayout:"hide",  //hide columns that dont fit on the table
 ajaxContentType:"json",
 initialSort:[             //set the initial sort order of the data
	 {column:"nom", dir:"asc"},
 ],
 columns:[ //Define Table Columns
	 {title:"Nom du cours", field:"nom", editor:"input"},
	 {title:"Date", field:"date", align:"center", editor:"input"},
	 {title:"Nombre de participant", field:"nb", align:"left", editor:"input"}
 ],
});

$("#ajax-trigger").click(function(){
		table.setData("data.php");
		table1.setData("data1.php");
		//table2.setData("data2.php");

});
