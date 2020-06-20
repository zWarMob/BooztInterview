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
        <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3 mr-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">To</span>
        </div>
        <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <button id="updateQueryBtn" type="button" class="btn btn-primary mb-3 mr-3">Query</button>
</div>

<canvas id="customers_and_orders" width="400" height="100"></canvas>

<script>

    var datesQueried = getDates(new Date('2020-05-20'), new Date('2020-06-19'));
    var chartLabels = datesQueried.map(x => x.toLocaleString("da-DK", { month: 'long', day: 'numeric' }));

    var data = <?php echo json_encode($orders) ?>;

    var datasets = getDatasetsFromData(data);

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

    function getDatasetsFromData(data){
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

    //Set event listener for btn
    //Query for orders data between 2 dates
    //var datasets = getDatasetsFromData(queriedData)
    //Update datesQueried array
    //customersAndOrdersChart.data.labels = getDates(dateFrom, dateTo);
    //customersAndOrdersChart.data.datasets[0].data = datasets.ordersDataset;
    //customersAndOrdersChart.data.datasets[1].data = datasets.customersDataset;

</script>