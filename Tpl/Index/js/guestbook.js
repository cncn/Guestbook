$(function () {
    $('form').validate({
        yhm: {
            rule: {
                required: true
            },
            error: {
                required: '用户姓名不能为空'
            }
        },
        // url: {
        //     rule: {
        //         required: true,
        //         regexp: /^http/i
        //     },
        //     error: {
        //         required: '网址不能为空',
        //         regexp: '网址非法'
        //     }
        // },
        email: {
            rule: {
                required: true,
                email: true
            },
            error: {
                required: '邮箱不能为空',
                email: '邮箱格式不正确'
            }
        },
        comment:{
             rule: {
                required: true
            },
            error: {
                required: '留言内容不能为空'
            }
        },
        code: {
            rule: {
                required: true,
                ajax: {url:WEB+'?g=Plugin&a=Link&m=code'}
            },
            error: {
                required: '验证码不能为空',
                email: '验证码输入错误'
            }
        }
    })
})
/**
 * 更新验证码
 */
function update_code() {
    var url = WEB + "?g=Plugin&a=Link&c=Index&m=code&_" + Math.random();
    $('img#code').attr('src', url);
}