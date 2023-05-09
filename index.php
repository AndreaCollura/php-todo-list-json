<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <title>My Cart</title>
</head>

<body>
    <div id="app">
        <div class="wrapper d-flex  justify-content-center p-5 h-100">
            <div>
                <div id="title" class="text-center">
                    <h1 class="text-center text-uppercase mb-5">my cart</h1>
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="container d-flex justify-content-center mb-4">
                    <input placeholder="what you need do add?" class="form-control" type="text" name="text" id="" v-model="newListEle" @keyup.enter="addListEle">
                    <button class="btn btn-success" @click="addListEle"><i class="fa-solid fa-cart-plus"></i></button>
                </div>
                <h3 class="text-uppercase" v-if="error">wrong input</h3>
                <div class="list-box">
                    <ul class="list-group" v-if="shoppingList.length > 0 ">
                        <li class=" d-flex justify-content-between" v-for="(product, index) in shoppingList" @click="confirmProduct(index)" :class="product.done ? 'alert alert-success': 'alert alert-light'">
                            <span class="fw-bold text-capitalize">{{product.text}}</span>
                            <button @click.stop="deleteProduct(index)" ><i class="fa-solid fa-trash-can"></i></button>
                        </li>
                    </ul>
                    <div v-else class="d-flex flex-column">
                        <h3 class="text-center text-uppercase">nothing here!</h3>
                        <img class="w-75 " src="./img/AccurateUnfinishedBergerpicard.webp" alt="travolta meme">
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>
</body>

</html>