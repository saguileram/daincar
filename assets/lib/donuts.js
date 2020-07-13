// JavaScript Document

Morris.Donut({
  element: 'graph1',
  data: [
	{value: 10, label: 'Control Focalizado'},
	{value: 20, label: 'Control integral'},
	{value: 30, label: 'Informe'},
	{value: 10, label: 'Estadística'}
  ],
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});