<!DOCTYPE html>
<html lang="en">
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
    * {
        box-sizing: border-box;
    }
    body {
        background-color: #fafafa;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .c-email {
        width: 40vw;
        border-radius: 40px;
        overflow: hidden;
        box-shadow: 0px 7px 22px 0px rgba(0, 0, 0, .1);
    }
    .c-email__header {
        background-color: #fee132;
        width: 100%;
        height: 60px;
    }
    .c-email__header__title {
        font-size: 23px;
        font-family: 'Open Sans', serif;
        height: 60px;
        line-height: 60px;
        margin: 0;
        text-align: center;
        color: black;
    }
    .c-email__content {
        width: 100%;
        height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        background-color: #fff;
        padding: 15px;
    }
    .c-email__content__text {
        font-size: 20px;
        text-align: center;
        color: #343434;
        margin-top: 0;
    }
    .c-email__code {
        display: block;
        width: 60%;
        background-color: #ddd;
        border-radius: 40px;
        padding: 20px;
        text-align: center;
        font-size: 36px;
        font-family: 'Open Sans', serif;
        letter-spacing: 10px;
        box-shadow: 0px 7px 22px 0px rgba(0, 0, 0, .1);
    }
    .c-email__footer {
        width: 100%;
        height: 60px;
        background-color: #fff;
    }
    .text-title {
        font-family: 'Open Sans';
    }
    .text-center {
        text-align: center;
    }
    .text-italic {
        font-style: italic;
    }
    .opacity-30 {
        opacity: 0.3;
    }
    .mb-0 {
        margin-bottom: 0;
    }

</style>
<body>

<div class="c-email">
    <div class="c-email__header">
        <h1 class="c-email__header__title">{{ env('APP_NAME') }}</h1>
    </div>
    <div class="c-email__content">
        <p class="c-email__content__text text-title">
            مرحبا بك {{ $user->name }}
        </p>
        <p class="c-email__content__text text-title">
            كود التفعيل الخاص بك
        </p>
        <div class="c-email__code">
            <span class="c-email__code__text">{{ $user->verification_code }}</span>
        </div>
    </div>
    <div class="c-email__footer"></div>
</div>

</body>

</html>
