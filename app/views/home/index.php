<?php
    //$childView = 'dashboard.php';
    include('default_layout.php');
    $orders = \SalesDashboard\Models\RichOrderViewModel::get_all();
?>

<canvas id="customers_and_orders" width="400" height="100"></canvas>

<script>

    var datesQueried = getDates(new Date('2020-05-20'), new Date('2020-06-19'));

    var data = <?php echo json_encode($orders) ?>;

    data = groupBy(data, x=>x.purchase_date);

    var chartLabels = datesQueried.map(x => x.toLocaleString("da-DK", { month: 'long', day: 'numeric' }));

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

    var customersAndOrdersChartElement = document.getElementById('customers_and_orders');
    var customersAndOrdersChart = new Chart(customersAndOrdersChartElement, {
        type: 'line',

        data: {
            datasets: [{
                label: 'Orders',
                data: ordersDataset,
                borderColor: `rgba(29,123,219, 0.3)`,
                backgroundColor: `rgba(29,123,219, 0.1)`,
            }, {
                label: 'Customers',
                data: customersDataset,
                borderColor: `rgba(219,123,29, 0.3)`,
                backgroundColor: `rgba(219,123,29, 0.1)`,
            }],
            labels: chartLabels
        }
    });
</script>