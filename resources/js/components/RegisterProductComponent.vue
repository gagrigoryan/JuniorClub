<template>
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <div class="form-group contact-us__form-content mb-4 px-4">
                        <input name="name" type="text" class="form-control contact_us-input my-3" placeholder="Имя продукта" v-model="currentProduct.name">
                        <textarea name="description" type="text" class="form-control contact_us-input my-3" placeholder="Описание" v-model="currentProduct.description"></textarea>
                        <input name="count" type="number" class="form-control contact_us-input my-3" placeholder="Количество занятий" v-model="currentProduct.count">
                        <input name="period" type="number" class="form-control contact_us-input my-3" placeholder="Количество месяцев" v-model="currentProduct.period">
                        <div class="age_period my-3">
                            <h5>Возраст</h5>
                            <div class="d-flex">
                                <input class="form-control contact_us-input mr-2" type="number" id="age_from" name="age_from" v-model="currentProduct.age_from" placeholder="От">
                                <input class="form-control contact_us-input ml-2" type="number" id="age_to" name="age_to" v-model="currentProduct.age_to" placeholder="До">
                            </div>
                        </div>
                        <h5>Цена</h5>
                        <input name="price" type="number" class="form-control contact_us-input my-3" placeholder="Цена" v-model="currentProduct.price" step="100">
                    </div>
                    <button v-if="!isChange" @click="addProduct" class="btn btn-primary">Добавить</button>
                    <div v-else class="d-flex">
                        <button @click="editProduct" class="btn btn-primary mr-3">Изменить</button>
                        <button @click="cancelEdit" class="btn btn-danger ml-3">Отменить</button>
                    </div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Имя</th>
                            <th scope="col">Кол. занятий</th>
                            <th scope="col">Месяцы</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in products" :key="product.id">
                            <th scope="row">{{ product.name }}</th>
                            <td>{{ product.count }}</td>
                            <td>{{ product.period }}</td>
                            <td>{{ product.price }}</td>
                            <td>
                                <button @click="toEdit(product)" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                <button @click="delProduct(product.id)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "RegisterProductComponent",
        data() {
          return {
              products: [],
              currentProduct: {
                  name: '',
                  description: '',
                  count: '',
                  period: '',
                  price: '',
                  age_from: '',
                  age_to: ''
              },
              isChange: false,
              changeProductId: ''
          }
        },
        mounted() {
            this.loadProducts()
        },
        methods: {
            loadProducts() {
                axios.get('/get-all-products').then((response) => {
                    console.log(response.data)
                    this.products = response.data
                });
            },

            addProduct() {
                for(let key in this.currentProduct) {
                    if (this.currentProduct[key] === '') {
                        let timerInterval;
                        swal.fire({
                            title: 'Заполните поля',
                            icon: 'info',
                            timer: 1500,
                            timerProgressBar: true,
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                        })
                        return false;
                    }
                }

                axios.post('/add-product', {
                    name: this.currentProduct.name,
                    description: this.currentProduct.description,
                    count: this.currentProduct.count,
                    price: this.currentProduct.price,
                    period: this.currentProduct.period,
                    age_from: this.currentProduct.age_from,
                    age_to: this.currentProduct.age_to,
                }).then(response => {
                    console.log(response);
                    toast.fire({
                        icon: 'success',
                        title: 'Предмет успешно добавлен'
                    });
                    this.loadProducts();
                }).catch(e => {
                    console.warn(e)
                });
            },

            delProduct(ProductId) {
                swal.fire({
                    title: 'Удаление продукта!',
                    text: "Вы уверены что хотите удалить продукт!?",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Да, удалить!'
                }).then((result) => {
                    console.log(result.value)
                    if (result.value) {
                        axios.delete('/admin/delete/product/' + ProductId)
                        .then(response => {
                            console.log(response);
                            swal.fire(
                                'Удалено!',
                                'Данного продукта больше не существует!',
                                'success'
                            );
                            this.loadProducts();
                        })
                        .catch(e => {
                            console.warn(e)
                        });
                    }
                });
            },

            toEdit(product) {
                this.isChange = true
                this.changeProductId = product.id
                this.currentProduct.name = product.name
                this.currentProduct.description = product.description
                this.currentProduct.period = product.period
                this.currentProduct.count = product.count
                this.currentProduct.price = product.price
                this.currentProduct.age_from = product.age_from
                this.currentProduct.age_to = product.age_to
            },

            cancelEdit() {
                this.isChange = false
                this.changeProductId = ''
                this.currentProduct.name = ''
                this.currentProduct.description = ''
                this.currentProduct.period = ''
                this.currentProduct.count = ''
                this.currentProduct.price = ''
                this.currentProduct.age_from = ''
                this.currentProduct.age_to = ''
            },

            editProduct() {
                if(this.changeProductId !== '') {
                    axios.post('/admin/update/product/' + this.changeProductId, {
                        name: this.currentProduct.name,
                        description: this.currentProduct.description,
                        count: this.currentProduct.count,
                        price: this.currentProduct.price,
                        period: this.currentProduct.period,
                        age_from: this.currentProduct.age_from,
                        age_to: this.currentProduct.age_to,
                    }).then(response => {
                        console.log(response);
                        toast.fire({
                            icon: 'success',
                            title: 'Предмет успешно обновлен'
                        });
                        this.loadProducts();
                    }).catch(e => {
                        console.warn(e)
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>
