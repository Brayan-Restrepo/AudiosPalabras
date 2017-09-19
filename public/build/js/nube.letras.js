$(document).ready(function() {
	$.ajax({
		url: 'https://web-pragma.herokuapp.com/palabras',
		type: 'GET',
	})
	.done(function(data) {
		nubeLetras(data);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});		
});
	
var color = d3.scale.category20();	

function nubeLetras(wordsJSON){
	d3.layout.cloud()
    .size([960, 600])
    .words(wordsJSON.map(function(d) {
      return {text: d.palabra, size: 10 + Math.random() * 50, test: "haha"};
    }))
    .rotate(function() { return ~~(Math.random() * 2) * 90; })
    .font("Impact")
    .fontSize(function(d) { return d.size; })
    .on("end", draw)
    .start();
}
function draw(words) {
  d3.select("#nube").append("svg")
      .attr("width", 960)
      .attr("height", 600)
    .append("g")
      .attr("transform", "translate(" + 960 / 2 + "," + 600 / 2 + ")")
    .selectAll("text")
      .data(words)
    .enter().append("text")
      .style("font-size", function(d) { return d.size + "px"; })
      .style("font-family", "Impact")
      .style("fill", function(d, i) { return color(i); })
      .attr("text-anchor", "middle")
      .attr("transform", function(d) {
        return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
      })
      .text(function(d) { return d.text; });
}