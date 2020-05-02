<template>
    <div class="main">
        <div class="container-fluid">
            <div class="card shadow-lg mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h5 class="m-0 font-weight-bold text-primary">Список пользователей</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ФИО</th>
                                <th>Email</th>
                                <th>Email подт.</th>
                                <th>Телефон</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td v-if="user.email_verified_at !== null" class="bg-success text-white">Да</td>
                                <td v-else class="bg-danger text-white">Нет</td>
                                <td>{{ user.phone }}</td>
                                <td class="text-center">
                                    <button @click="delUser(user.id)" class="btn btn-danger btn-circle mx-1 my-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button @click="editUser(user)" class="btn btn-warning btn-circle mx-1 my-1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "RegisteruserComponent",
        data() {
            return {
                users: [],
                currentUser: {}
            }
        },
        mounted() {
            this.loadUsers()
        },
        methods: {
            loadUsers() {
                axios.get('/admin/get-all-users').then((response) => {
                    this.users = response.data
                });
            },

            delUser(userId) {
                swal.fire({
                    title: 'Удаление',
                    text: "Вы уверены что хотите удалить пользователя?",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Да, удалить!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/admin/delete/user/' + userId)
                            .then(response => {
                                console.log(response);
                                swal.fire(
                                    'Удалено!',
                                    'Удаление проведено успешно!',
                                    'success'
                                );
                                this.loadUsers()
                            })
                            .catch(e => {
                                console.warn(e)
                            });
                    }
                });
            },

            editUser(user) {
                swal.fire({
                    title: 'Изменине данных пользователя!',
                    html:
                        `<input id="name" class="swal2-input edit-input" value="${user.name}" required>` +
                        `<input type="phone" id="phone" class="swal2-input edit-input" value="${user.phone}" required>`,
                    focusConfirm: false,
                    confirmButtonText: 'Изменить',
                    preConfirm: () => {
                        let name = document.getElementById('name').value
                        let phone = document.getElementById('phone').value
                        if (!name || name.match(/^ *$/) !== null) {
                            swal.showValidationMessage('Укажите ФИО!')
                        }
                        else if (!phone || phone.match(/^ *$/) !== null) {
                            swal.showValidationMessage('Укажите телефон!')
                        }
                        else {
                            axios.post('/admin/update/user/' + user.id, {
                                name: name.toLowerCase()
                                    .split(' ')
                                    .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
                                    .join(' '),
                                phone: phone
                            }).then(response => {
                                toast.fire({
                                    icon: 'success',
                                    title: 'Данные о пользователе успешно обновлены!'
                                });
                                this.loadUsers();
                            }).catch(e => {
                                console.warn(e)
                            });
                        }
                    }
                })
            }
        }
    }
</script>
<style scoped>

</style>
