<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['class' => 'mb-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-3']); ?>
    <div class="card-title"><?php echo e($cardTitle); ?></div>
    <div class="mb-3 fw-bold h4"><?php echo e($totalOrdersPerMonth->sum('total')); ?></div>
    <canvas id="total-orders-chart"></canvas>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
        var orders_chart_element = document.getElementById("total-orders-chart").getContext("2d");
        orders_chart = new Chart(orders_chart_element, {
            type: "line",
            data: {
                labels: [],
                datasets: [{
                    label: "<?php echo e(__('Invoices')); ?>",
                    borderColor: "#1A73E8",
                    borderWidth: 3,
                    lineTension: 0.05,
                    data: []
                }]
            },
            options: {
                layout: {
                    padding: 10
                },
                legend: {
                    position: "bottom"
                },
                title: {
                    display: !0,
                    text: "Total Orders Per Month"
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: !0,
                            labelString: "Total Orders Per Month"
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: !0,
                            labelString: "Data"
                        }
                    }]
                }
            }
        });
        <?php $__currentLoopData = $totalOrdersPerMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            orders_chart.data.labels.push("<?php echo e($order->date); ?>"), orders_chart.data.datasets.forEach(a => {
                a.data.push("<?php echo e($order->total); ?>");
            });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        orders_chart.update();
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/mohammadmahbub/Downloads/Alla_Auto_Parts/www/resources/views/orders/analytics/total-orders.blade.php ENDPATH**/ ?>