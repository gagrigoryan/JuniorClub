<template>
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg mb-4 border-bottom-warning">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary">Заказы на обработку</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-md-12">
                                <input type="text" v-model="deactiveSearch" class="form-control my-4 search-input" placeholder="Имя пользователя...">
                            </div>
                            <table class="table table-bordered" id="dataTablePaid" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Пользователь</th>
                                    <th>Телефон</th>
                                    <th>Студент</th>
                                    <th>Предмет</th>
                                    <th>Дата</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="order in filteredDeactiveOrders" :key="order.id">
                                    <td>{{ order.id }}</td>
                                    <td>{{ order.user.name }}</td>
                                    <td>{{ order.user.phone }}</td>
                                    <td>{{ order.student.name }}</td>
                                    <td>{{ order.product.name }}</td>
                                    <td>
                                        <date-picker v-model="order.activeDate" valueType="format"></date-picker>
                                    </td>
                                    <td>
                                        <button class="btn btn-success"
                                                :class="{'disabled': !order.activeDate}"
                                                :disabled="!order.activeDate"
                                                @click="activate(order)">
                                            Активировать
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-lg mb-4 border-bottom-success">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary">Подтвержденные заказы</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-md-12">
                                <input type="text" v-model="activeSearch" class="form-control my-4 search-input" placeholder="Имя пользователя...">
                            </div>
                            <table class="table table-bordered" id="dataTableActive" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Пользователь</th>
                                    <th>Телефон</th>
                                    <th>Студент</th>
                                    <th>Предмет</th>
                                    <th>Дата подтв.</th>
                                    <th>Дата оконч.</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="order in filteredActiveOrders" :key="order.id">
                                    <td>{{ order.id }}</td>
                                    <td>{{ order.user.name }}</td>
                                    <td>{{ order.user.phone }}</td>
                                    <td>{{ order.student.name }}</td>
                                    <td>{{ order.product.name }}</td>
                                    <td>{{ order.activeDate }}</td>
                                    <td>{{ order.expireDate }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-lg mb-4 border-bottom-danger">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary">Просроченные заказы</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-md-12">
                                <input type="text" v-model="expiredSearch" class="form-control my-4 search-input" placeholder="Имя пользователя...">
                            </div>
                            <table class="table table-bordered" id="dataTableExpire" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Пользователь</th>
                                    <th>Телефон</th>
                                    <th>Студент</th>
                                    <th>Предмет</th>
                                    <th>Дата</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="order in filteredExpiredOrders" :key="order.id">
                                    <td>{{ order.id }}</td>
                                    <td>{{ order.user.name }}</td>
                                    <td>{{ order.user.phone }}</td>
                                    <td>{{ order.student.name }}</td>
                                    <td>{{ order.product.name }}</td>
                                    <td>{{ order.created_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-lg mb-4 border-bottom-danger">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary">Не оплаченные заказы</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-md-12">
                                <input type="text" v-model="notPaidSearch" class="form-control my-4 search-input" placeholder="Имя пользователя...">
                            </div>
                            <table class="table table-bordered" id="dataTableNotPaid" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Пользователь</th>
                                    <th>Телефон</th>
                                    <th>Студент</th>
                                    <th>Предмет</th>
                                    <th>Дата</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="order in filteredNotPaidOrders" :key="order.id">
                                    <td>{{ order.id }}</td>
                                    <td>{{ order.user.name }}</td>
                                    <td>{{ order.user.phone }}</td>
                                    <td>{{ order.student.name }}</td>
                                    <td>{{ order.product.name }}</td>
                                    <td>{{ order.created_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import DatePicker from 'vue2-datepicker'
    import 'vue2-datepicker/index.css'

    export default {
        name: "ChangeOrdersComponent",
        components: { DatePicker },
        data() {
            return {
                orders: [],
                activeSearch: '',
                deactiveSearch: '',
                notPaidSearch: '',
                expiredSearch: ''
            }
        },
        mounted() {
            this.loadOrders()
        },
        methods: {
            loadOrders() {
                axios.get('/admin/get-orders').then((response) => {
                    this.orders = response.data;
                });
            },

            activate(order) {
                axios.post('/admin/activate/order/' + order.id, {
                    activeDate: order.activeDate
                }).then(response => {
                    console.log(response);
                    toast.fire({
                        icon: 'success',
                        title: 'Заказ активирован!'
                    });
                    this.loadOrders();
                }).catch(e => {
                    console.warn(e)
                });
            }
        },
        computed: {
            activeOrders() {
                return this.orders.filter(order => order.active)
            },

            deactiveOrders() {
                return this.orders.filter(order => !order.active && order.paid)
            },

            notPaidOrders() {
                return this.orders.filter(order => !order.paid)
            },

            expiredOrders() {
                return this.orders.filter(order => order.active === -1)
            },

            filteredActiveOrders() {
                return this.activeOrders.filter(order => {
                    return order.user.name.toLowerCase().match(this.activeSearch.toLowerCase())
                })
            },

            filteredDeactiveOrders() {
                return this.deactiveOrders.filter(order => {
                    return order.user.name.toLowerCase().match(this.deactiveSearch.toLowerCase())
                })
            },

            filteredNotPaidOrders() {
                return this.notPaidOrders.filter(order => {
                    return order.user.name.toLowerCase().match(this.notPaidSearch.toLowerCase())
                })
            },

            filteredExpiredOrders() {
                return this.expiredOrders.filter(order => {
                    return order.user.name.toLowerCase().match(this.expiredSearch.toLowerCase())
                })
            },
        }
    }
</script>

<style scoped>
    .search-input {
        border-radius: 25px;
    }
</style>
