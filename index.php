<?php
include_once './config/database.php';
include_once './class/product.php';

$database = new Database();
$db = $database->getConnection();

$items = new Product($db);

$stmt = $items->getProducts();
$itemCount = $stmt->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Projek PHP Simple</title>
</head>
<body>
    <div class="container mx-auto">
            <section class="antialiased text-gray-600 h-screen px-4">
                <div class="flex flex-col justify-center h-full">
                    <!-- Table -->
                    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                        <header class="px-5 py-4 border-b border-gray-100">
                            <h2 class="font-semibold text-gray-800">Products</h2>
                        </header>
                        <div class="p-3">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full">
                                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                        <tr>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left">Product Name</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left">Price</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left">Stock</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center">Satus</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm divide-y divide-gray-100">
                                        <?php 
                                            $no=1;
                                            foreach($stmt as $dt){
                                        ?>
                                        <tr>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="font-medium text-gray-800"><?php echo $dt['product_name']?></div>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left font-medium text-green-500">Rp<?php echo $dt['product_price']?></div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left"><?php echo $dt['product_stock']?></div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-sm text-center"><?php echo $dt['product_status']?></div>
                                            </td>
                                        </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    
</body>
</html>