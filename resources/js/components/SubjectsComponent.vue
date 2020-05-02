<template>
    <div class="main mt-5 text-gray-300">
        <h1>Наши направления</h1>
        <div class="row">
            <div class="col-12 my-3">
                <input type="text" v-model="search" class="form-control search-input" placeholder="Название дисциплины...">
            </div>
            <div class="col-md-6 col-lg-4  d-flex align-items-stretch my-3" v-for="product in filteredProducts">
                <div class="card px-3 py-4 product__card">
                    <div class="card-body">
                        <span>Период: </span> {{ product.period}} {{ product.period > 1 ? 'месяца' : 'месяц' }} <br>
                        <span>Всего занятий: </span> {{ product.count * 4 * product.period }}
                        <h3 class="card-title mt-4">{{ product.name }}</h3>
                        <h5 class="card-subtitle">Для детей от 8 до 10 лет</h5>
                        <p class="card-text mt-4">{{ product.description.substr(0, 150) | snipped }}...</p>
                        <button @click="addOrder" class="btn btn-outline-primary card__btn">{{ product.price }} &#8381;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "SubjectsComponent",
        mounted() {
            this.loadProducts()
        },
        data() {
            return {
                products: [],
                search: ''
            }
        },
        computed: {
          filteredProducts() {
              return this.products.filter(product => {
                  return product.name.toLowerCase().match(this.search.toLowerCase())
              })
          }
        },
        methods: {
            loadProducts() {
                axios.get('/get-all-products').then((response) => {
                    console.log(response.data)
                    this.products = response.data
                });
            },

            addOrder() {
                window.location.href = '/login'
            }
        }
    }
</script>

<style scoped>
    .main {
        font-family: 'Nunito', sans-serif;
    }

    .product__card {
        border-radius: 15px;
        transition: .4s ease;
        cursor: pointer;
    }

    .product__card:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 25px rgba(0,0,0,0.22);
    }

    .card__btn {
        width: 100%;
        border-radius: 25px;
        font-size: 1.5rem;
    }

    .search-input {
        border-radius: 25px;
    }
</style>
