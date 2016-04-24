

function loadSunBurst(data){
	
	var myjson = data;


    var width = 500 ,
    height = 560,
    radius = Math.min(width, height) / 2;

	
var tooltip = d3.select("#sunBurst")
    .append("div")
    .attr("id", "tooltip")
    .style("position", "absolute")
    .style("z-index", "10")
    .style("opacity", 0);
	
	
function filter_min_arc_size_text(d, i) {return (d.dx*d.depth*radius/3)>7};
	
function format_description(d) {
  var description = d.description;
      return  '<b>' + d.name;
}

function mouseOverArc(d) {
			 d3.select(this).attr("stroke","black")
			 
          tooltip.html(format_description(d));
          return tooltip.transition()
            .duration(50)
            .style("opacity", 0.9);
        }

function mouseOutArc(){
	d3.select(this).attr("stroke","")
	return tooltip.style("opacity", 0);
}

function mouseMoveArc (d) {
          return tooltip
            .style("top", (d3.event.pageY-10)+"px")
            .style("left", (d3.event.pageX+10)+"px");
}
	
var x = d3.scale.linear()
    .range([0, 2 * Math.PI]);

var y = d3.scale.linear()
    .range([0, radius]);

var color = d3.scale.category20c();

var svg = d3.select("#sunBurst").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + width / 2 + "," + (height / 2 + 10) + ")");

var partition = d3.layout.partition()
    .value(function(d) { return d.size; });

var arc = d3.svg.arc()
    .startAngle(function(d) { return Math.max(0, Math.min(2 * Math.PI, x(d.x))); })
    .endAngle(function(d) { return Math.max(0, Math.min(2 * Math.PI, x(d.x + d.dx))); })
    .innerRadius(function(d) { return Math.max(0, y(d.y)); })
    .outerRadius(function(d) { return Math.max(0, y(d.y + d.dy)); });


root = myjson;
	
	
 {
  var g = svg.selectAll("g")
      .data(partition.nodes(root))
    .enter().append("g");

  var path = g.append("path")
    .attr("d", arc)
    .style("fill", function(d) { 
	if(d.Right == "Yes")
		return "red";
	else
		return color((d.children ? d : d.parent).name); })
    .on("click", click)
	.on("mouseover", mouseOverArc)
      .on("mousemove", mouseMoveArc)
      .on("mouseout", mouseOutArc);

  var text = g.append("text")
	.filter(filter_min_arc_size_text)
    .attr("transform", function(d) { return "rotate(" + computeTextRotation(d) + ")"; })
    .attr("x", function(d) { return y(d.y); })
    .attr("dx", "6") // margin
    .attr("dy", ".35em") // vertical-align
    .text(function(d) { return d.name; });

  function click(d) {
    // fade out all text elements
    text.transition().attr("opacity", 0);

    path.transition()
      .duration(750)
      .attrTween("d", arcTween(d))
      .each("end", function(e, i) {
          // check if the animated element's data e lies within the visible angle span given in d
          if (e.x >= d.x && e.x < (d.x + d.dx)) {
            // get a selection of the associated text element
            var arcText = d3.select(this.parentNode).select("text");
            // fade in the text element and recalculate positions
            arcText.transition().duration(750)
              .attr("opacity", 1)
              .attr("transform", function() { return "rotate(" + computeTextRotation(e) + ")" })
              .attr("x", function(d) { return y(d.y); });
          }
      });
  }
};

d3.select(self.frameElement).style("height", height + "px");


// Interpolate the scales!
function arcTween(d) {
  var xd = d3.interpolate(x.domain(), [d.x, d.x + d.dx]),
      yd = d3.interpolate(y.domain(), [d.y, 1]),
      yr = d3.interpolate(y.range(), [d.y ? 20 : 0, radius]);
  return function(d, i) {
    return i
        ? function(t) { return arc(d); }
        : function(t) { x.domain(xd(t)); y.domain(yd(t)).range(yr(t)); return arc(d); };
  };
}

function computeTextRotation(d) {
	if(d.name == "util")
	{
		
		var rotation = (x(d.x + d.dx / 2) - Math.PI / 2) / Math.PI * 180;
		
	}
  return (x(d.x + d.dx / 2) - Math.PI / 2) / Math.PI * 180;
}

}





