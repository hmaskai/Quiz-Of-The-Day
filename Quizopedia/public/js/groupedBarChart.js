function loadGroupedBarChart(data, noOfStudents){
	
	
	
	var myDataString = data;
	var myData = d3.csv.parse(myDataString);
	
	var margin = {top: 20, right: 20, bottom: 50, left: 40},
	width = (screen.width/3) - margin.left - margin.right,
	height = 500 - margin.top - margin.bottom;

	var x0 = d3.scale.ordinal()
		.rangeRoundBands([0, width], .1);

	var x1 = d3.scale.ordinal();

	var y = d3.scale.linear()
		.range([height, 0]);

	var color = d3.scale.ordinal()
		.range(["#2CA02C", "#FF7F0E", "#1F77B4"]);

	var xAxis = d3.svg.axis()
		.scale(x0)
		.orient("bottom");

	var yAxis = d3.svg.axis()
		.scale(y)
		.orient("left")
		.tickFormat(d3.format(".2s"))
		.ticks(noOfStudents);

	var svg = d3.select("#groupedBarChart").append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
	  .append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

		
      var data = myData;
	  
	  var ageNames = d3.keys(data[0]).filter(function(key) { return key !== "QuestionID"; });

	  data.forEach(function(d) {
		d.ages = ageNames.map(function(name) { return {name: name, value: +d[name]}; });
	  });

	  x0.domain(data.map(function(d) { return d.QuestionID; }));
	  x1.domain(ageNames).rangeRoundBands([0, x0.rangeBand()]);
	  y.domain([0, d3.max(data, function(d) { return d3.max(d.ages, function(d) { return d.value; }); })]);

	  svg.append("g")
		  .attr("class", "x axis")
		  .attr("transform", "translate(0," + height + ")")
		  .call(xAxis)
		  .selectAll("text")
			.style("text-anchor", "end")
			.style("font-size","105%")
			.attr("dx", "-.8em")
			.attr("dy", ".15em")
			.attr("transform", "rotate(-45)" );

	  svg.append("g")
		  .attr("class", "y axis")
		  .call(yAxis)
		.append("text")
		  .attr("transform", "rotate(-90)")
		  .attr("y", 6)
		  .attr("dy", ".71em")
		  .style("text-anchor", "end")
		  .text("Number of Students");

	  var state = svg.selectAll(".QuestionID")
		  .data(data)
		.enter().append("g")
		  .attr("class", "state")
		  .attr("transform", function(d) { return "translate(" + x0(d.QuestionID) + ",0)"; });

	  state.selectAll("rect")
		  .data(function(d) { return d.ages; })
		.enter().append("rect")
		  .attr("width", x1.rangeBand())
		  .attr("x", function(d) { return x1(d.name); })
		  .attr("y", function(d) { return y(d.value); })
		  .attr("height", function(d) { return height - y(d.value); })
		  .style("fill", function(d) { return color(d.name); });
/*
	  var legend = svg.selectAll(".legend")
		  .data(ageNames.slice().reverse())
		.enter().append("g")
		  .attr("class", "legend")
		  .attr("transform", function(d, i) { return "translate(30," + i * 20 + ")"; });

	  legend.append("rect")
		  .attr("x", width - 18)
		  .attr("width", 18)
		  .attr("height", 18)
		  .style("fill", color);

	  legend.append("text")
		  .attr("x", width - 24)
		  .attr("y", 9)
		  .attr("dy", ".35em")
		  .style("text-anchor", "end")
		  .text(function(d) { return d; });
*/
	
}