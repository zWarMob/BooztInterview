<?php
    //$childView = 'dashboard.php';
    include('default_layout.php');
    $orders = \SalesDashboard\Models\RichOrderViewModel::get_all();
?>

<div class="form-inline">
    <div class="input-group mb-3 mr-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">From</span>
        </div>
        <input id="dateFromInput" type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3 mr-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">To</span>
        </div>
        <input id="dateToInput" type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <button id="updateQueryBtn" type="button" class="btn btn-primary mb-3 mr-3">Query</button>
</div>

<div class="container-fluid">
    <div class="row border-top border-bottom">
        <div class="col-sm-3 col-md-2">Revenue</div>
        <div class="col-sm-3 col-md-2"><span id="revenue" class="format-num">100,000</span> DKK</div>
    </div>
    <div class="row border-bottom">
        <div class="col-sm-3 col-md-2">Customers</div>
        <div class="col-sm-3 col-md-2"><span id="customers" class="format-num">100,000</span> DKK</div>
    </div>
    <div class="row border-bottom">
        <div class="col-sm-3 col-md-2">Orders</div>
        <div class="col-sm-3 col-md-2"><span id="orders" class="format-num">100,000</span> DKK</div>
    </div>
</div>

<canvas id="customers_and_orders" width="400" height="100"></canvas>

<script>

    var datesQueried = getDates(new Date('2020-05-20'), new Date('2020-06-19'));
    var chartLabels = datesQueried.map(x => x.toLocaleString("da-DK", { month: 'long', day: 'numeric' }));

    var data = <?php echo json_encode($orders) ?>;

    var datasets = getDatasetsFromData(data, datesQueried);

    var customersAndOrdersChartElement = document.getElementById('customers_and_orders');
    var customersAndOrdersChart = new Chart(customersAndOrdersChartElement, {
        type: 'line',

        data: {
            datasets: [{
                label: 'Orders',
                data: datasets.ordersDataset,
                borderColor: `rgba(29,123,219, 0.3)`,
                backgroundColor: `rgba(29,123,219, 0.1)`,
            }, {
                label: 'Customers',
                data: datasets.customersDataset,
                borderColor: `rgba(219,123,29, 0.3)`,
                backgroundColor: `rgba(219,123,29, 0.1)`,
            }],
            labels: chartLabels
        }
    });

    function getDatasetsFromData(data, datesQueried){
        data = groupBy(data, x=>x.purchase_date);

        var ordersDataset = Array(datesQueried.length).fill(0);
        var customersDataset = Array(datesQueried.length).fill(0);

        for (let [key, value] of data.entries()) {
            //console.log(key + ' = ' + value)
            var dateIndex = datesQueried.findIndex(x => x.getTime() == (new Date(key)).getTime());
            if(dateIndex != -1){
                //ordersDataset[dateIndex] += value.length;
                customersGroup = groupBy(value, x=>x.customer_id);
                customersDataset[dateIndex] += customersGroup.size;
                ordersGroup = groupBy(value, x=>x.order_id);
                ordersDataset[dateIndex] += ordersGroup.size;
            }
        }

        return {chartLabels: chartLabels, ordersDataset: ordersDataset, customersDataset: customersDataset};
    }

    document.getElementById("updateQueryBtn").onclick = function(){
        var dateFrom = document.getElementById("dateFromInput").value;
        var dateTo = document.getElementById("dateToInput").value;

        httpGetAsync(`/home/QueryRichOrderView?to=${dateTo}&from=${dateFrom}`,function(data){
            if(data==null)
                alert("No data found for period");
            else
            {
                var datesForLabeling = getDates(new Date(dateFrom), new Date(dateTo));

                datasets = getDatasetsFromData(JSON.parse(data),datesForLabeling);

                customersAndOrdersChart.data.labels = datesForLabeling.map(x => x.toLocaleString("da-DK", { month: 'long', day: 'numeric' }));
                customersAndOrdersChart.data.datasets[0].data = datasets.ordersDataset;
                customersAndOrdersChart.data.datasets[1].data = datasets.customersDataset;

                customersAndOrdersChart.update();
            }
        });
    };

</script>