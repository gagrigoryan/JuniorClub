<template>
    <div id="home">
        <button class="menu__button" @click="menuBtnClick">
            <i v-if="buttonMenuFlag" class="fas fa-bars"></i>
            <i v-else class="fas fa-times"></i>
        </button>
        <div class="home" :style="{ 'background-color': bgColor, color: textColor }">
            <div v-if="hideMenuFlag" class="sidebar">
                <ul class="sidebar__menu">
                    <li v-for="item in sidebarItems"><a href="#">{{ item }}</a></li>
                </ul>
            </div>
            <div class="home__content" :style="{ 'transform': 'translateX(' + contentTranslate + 'vw)' }">
                <h1>Title</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur cumque doloribus ducimus ipsa nemo possimus ut vitae! Ab blanditiis ducimus, hic itaque minus natus praesentium quae quisquam repudiandae ullam!</p>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "homeComponent",
        props: ['user', 'students'],
        data() {
            return {
                sidebarItems: ['Студенты', 'Расписание', 'Предметы', 'Уведомления'],
                hideMenuFlag: false,
                buttonMenuFlag: true,
                bgColor: 'none',
                textColor: '',
                contentTranslate: 0
            }
        },
        methods: {
            menuBtnClick() {
                if (!this.hideMenuFlag) {
                    this.bgColor = '#051e3e'
                    this.textColor = '#ebebeb'
                    this.contentTranslate = 15
                } else {
                    this.bgColor = ''
                    this.textColor = ''
                    this.contentTranslate = 0
                }
                this.buttonMenuFlag = !this.buttonMenuFlag
                this.hideMenuFlag = !this.hideMenuFlag
            }
        }
    }
</script>

<style lang="sass" scoped>
    li
        list-style: none

    a
        text-decoration: none

    button
        background: none
        border: none

    #home
        width: 100%
        height: 100%

    .home
        display: flex
        justify-content: center
        transition: all .5s ease
        &__content
            width: 100%
            transition: all .3s ease-in

    .sidebar
        overflow-x: hidden
        transition: width .4s ease-in-out
        background-color: #020c2f
        padding: 20px
        &__menu
            display: flex
            flex-direction: column
            padding: 0
            li
                display: block
                padding: 15px 40px
                a
                    text-transform: uppercase


    .hiding
        width: 0


</style>
