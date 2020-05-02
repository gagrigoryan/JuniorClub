<template>
    <div class="main mt-5">
        <div class="row">
            <div class="col-md-12">
                <input type="text" v-model="search" class="form-control search-input" placeholder="Название дисциплины...">
            </div>
            <div class="col-md-6 col-lg-4  d-flex align-items-stretch my-3" v-for="product in filteredProducts">
                <div class="card px-3 py-4 product__card">
                    <div class="card-body">
                        <span>Период: </span> {{ product.period}} {{ product.period > 1 ? 'месяца' : 'месяц' }} <br>
                        <span>Всего занятий: </span> {{ product.count * 4 * product.period }}
                        <h3 class="card-title mt-4">{{ product.name }}</h3>
                        <h5 class="card-subtitle">Для детей от {{ product.age_from }} до {{ product.age_to }} лет</h5>
                        <p class="card-text mt-4">{{ product.description.substr(0, 150) }}...</p>
                        <button @click="addOrder(product.id)" class="btn btn-outline-primary card__btn">{{ product.price }} &#8381;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        mounted() {
            this.loadProducts()
            this.loadStudents()
        },
        props: ['userId'],
        data() {
            return {
                products: [],
                students: [],
                studentOrders: [],
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
                    this.products = response.data
                });
            },

            loadStudents() {
                axios.get('/get-students/' + this.userId).then((response) => {
                    this.students = response.data[0]
                    this.studentOrders = response.data[1]
                });
            },

            async addOrder(productId) {
                const { value: fruit } = await swal.fire({
                    title: 'Выбирите студента!',
                    input: 'select',
                    inputOptions: this.students,
                    inputPlaceholder: 'Студент',
                    showCancelButton: true,
                    inputValidator: (value) => {
                        return new Promise((resolve) => {
                            if (this.studentOrders[value].includes(productId)) {
                                resolve('У студента есть данный курс!:)')
                            } else {
                                resolve()
                            }
                        })
                    }
                })

                if (fruit) {
                    axios.post('/add/order', {
                        user_id: this.userId,
                        product_id: productId,
                        student_id: parseInt(fruit)
                    }).then(response => {
                        console.log(response);
                        toast.fire({
                            icon: 'success',
                            title: 'Предмет успешно добавлен!'
                        });
                        window.location.href = '/home'
                    }).catch(e => {
                        console.warn(e)
                    });
                }

            }
        }
    }
</script>

<style scoped>

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
