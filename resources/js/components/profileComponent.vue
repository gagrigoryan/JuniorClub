<template>
    <div class="main">
        <div class="container-fluid">
            <div class="card shadow-lg p-2 p-md-5 col-12 col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-main-info d-flex m-3">
                            <img alt="" class="img-profile rounded-circle shadow-lg" :src="avatarPath">
                        </div>
                        <form action="/profile" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="_token" :value="csrf">
                            <div class="d-flex align-items-center">
                                <label class="btn file-update-label btn-outline-success mr-2 mt-1" for="fileUpdate">{{ filename }}</label>
                                <button type="submit" class="btn btn-primary btn-circle"><i class="fas fa-cloud-upload-alt" ></i></button>
                            </div>
                            <input ref="avatar" id="fileUpdate" type="file" class="btn btn-outline-info" name="avatar" @change="previewFiles">
                        </form>
                    </div>

                    <div class="col-md-8">
                        <form method="POST" action="/update-user">
                            <input type="hidden" name="_token" :value="csrf">
                            <div class="name_email d-flex">
                                <input id="name" type="text" placeholder="ФИО" :value="user.name" class="form-control info-input mx-1" name="name" required>
                                <input id="email" type="email" placeholder="Email" :value="user.email" class="form-control info-input mx-1 disabled" disabled name="email">
                            </div>
                            <input id="phone" type="phone" placeholder="Телефон" :value="user.phone" class="form-control info-input mx-1 my-3" name="phone" required>
                            <hr class="sidebar-divider my-3">
                            <h6 class="text-center">Изменить пароль</h6>
                            <div class="changePassword d-flex">
                                <input id="password" type="password" placeholder="Введите пароль" class="form-control info-input mx-1" name="password" autocomplete="new-password" v-model="password">
                                <input id="password-confirm" type="password" placeholder="Повторите пароль" class="form-control info-input mx-1" name="password_confirmation" autocomplete="new-password" v-model="confirmPassword">
                            </div>
                            <button type="submit" :class="{'disabled': confPass}" class="btn btn-success info-input my-4 ml-auto" :disabled="confPass">Изменить</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "profileComponent",
        props: ['csrf'],
        data() {
            return {
                user: {},
                filename: 'Вибирите фото',
                password: '',
                confirmPassword: ''
            }
        },
        mounted() {
            this.loadUser()
        },
        methods: {
            loadUser() {
                axios.get('/get-user/').then((response) => {
                    this.user = response.data;
                });
            },

            previewFiles() {
                this.filename = this.$refs.avatar.files[0].name
                console.log(this.filename)
            }
        },
        computed: {
            avatarPath() {
                return 'img/avatars/' + this.user.avatar;
            },

            confPass() {
                if (this.password === this.confirmPassword) {
                    if (this.password.length < 8 && (this.password !== ''))
                        return true
                    return false
                }
                return true
            }
        }
    }
</script>

<style scoped>
    .img-profile {
        width: 150px;
        height: 150px;
    }

    input[type=file] {
        display: none;
    }

    .file-update-label {
        border-radius: 25px;
        cursor: pointer;
        width: 10rem;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }

    .info-input {
        border-radius: 25px;
    }

</style>
