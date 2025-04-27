// Start Site Setting 
const getsitesettings = document.getElementById("sitesettings");

getsitesettings.addEventListener("click",function(){
    document.body.classList.toggle("show-nav");
});


// End Site Setting 
// Start Navbar 
    // start top navbar 
    function dropbtn(e){
        // console.log(e.target);
        // console.log(e.target.parentElement.nextElementSibling);

        e.target.parentElement.nextElementSibling.classList.toggle("show");

    }
    // start top navbar 
// End Navbar 

$(document).ready(function(){
// Start Navbar 
    // start left sidebar 
        $(".sidebarlinks").click(function(){
            $(".sidebarlinks").removeClass("currents");
            $(this).addClass("currents");
        })
        
    // end left sidebar 
// End Navbar 
});

// Start Gauge Area 
var gaugeurs = new JustGage({
    id: "guageusers", // the id of the html element
    value: 50,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6
});
var gaugecus = new JustGage({
    id: "guagecustomers", // the id of the html element
    value: 50,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6
});
var gaugeemps = new JustGage({
    id: "guageemployes", // the id of the html element
    value: 50,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6
});
var gaugeivs = new JustGage({
    id: "guageinvesters", // the id of the html element
    value: 50,
    min: 0,
    max: 100,
    decimals: 2,
    gaugeWidthScale: 0.6
});

// update the value randomly
setInterval(() => {
    gaugeurs.refresh(Math.random() * 100);
}, 5000)
setInterval(() => {
    gaugecus.refresh(Math.random() * 100);
}, 5000)
setInterval(() => {
    gaugeemps.refresh(Math.random() * 100);
}, 5000)
setInterval(() => {
    gaugeivs.refresh(Math.random() * 100);
}, 5000)
// End Gauge Area 

// Start  Expenses Area 
const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [12, 19, 3],
        borderWidth: 1
      }]
    },
    options: {
    }
  });
// ENd  Expenses Area 

// Start Earning Area 
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
    ]);

    var options = {
        title: 'Sales Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
    };    

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
}

// End Earning Area 



window.addEventListener("resize",function(){
    const getnav = this.document.getElementById("nav");

    let devicewidth = this.innerWidth;

    // console.log(devicewidth);

    if(devicewidth > 767){
        getnav.classList.remove("collapse");
    }
})

// start footer
const getyear = document.getElementById("getyear");
const getfullyear = new Date().getFullYear();
getyear.textContent = getfullyear;
// End footer