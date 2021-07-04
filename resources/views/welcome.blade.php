<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Twitter API - ByPabloC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <br/>
                <br/>
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <div class="ml-4 text-lg leading-7 font-semibold">
                        <a href="https://github.com/bypabloc" target="_blank" class="underline text-gray-900 dark:text-white">
                            Twitter API - ByPabloC
                        </a>
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

                    
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    Instrucción de uso (JavaScript):
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-base font-semibold">
                                    Todas las cabeceras deben contener, en el headers el dispositivo:
                                    <pre><code>device: 'SO: Linux x86_64 || Navegador: Mozilla/5.0'</code></pre>
                                    <br/>
                                    Y tambien debe indicar el 'Accept':
                                    <pre><code>Accept: 'application/json'</code></pre>

                                    <br/>
                                    Si solicita una ruta que requiera de autorizacion debe contener el token, ejemplo:

                                    <pre><code>Authorization: 'Bearer 27|1n2ZSBKoeKY37HuRmEvSPXH25sDrJZT4EuS7hVYV'</code></pre>

                                    <br/>
                                    Ejemplo de una solicitud con Axios:
                                    <pre><code>
const axiosIns = axios.create({
    mode: 'cors',
    cache: 'no-cache', 
    baseURL: 'https://bypabloc-twitter-api.herokuapp.com/api/v1',
    headers: {
        'Content-Type' : 'application/x-www-form-urlencoded',
        Accept : 'application/json',
        device: 'SO: Linux x86_64 || Navegador: Mozilla/5.0',
    },
    redirect: 'follow', 
    referrerPolicy: 'no-referrer', 
})

axiosIns.get('tweets')
.then( (res) => {
    console.log('response',res);
});

axiosIns.post('login',{
    user: 'bypabloc',
    password: '123456',
})
.then( (res) => {
    console.log('response',res);
});
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    Titulo                                    
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Contenido
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <br/>
                <br/>
                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-lg">
                        Rutas disponibles:
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    /login (POST)
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Request:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
{
    user: 'bypabloc',
    password: '123456',
}
                                    </code></pre>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Response:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
{
    "data": {
        "token": "43|i8RHiqJnHKSiN7ArV7c8N4aU1N6EeZOdPeEjssQm",
        "name": "Pablo Contreras",
        "nickname": "bypabloc",
        "email": "pacg1991@gmail.com"
    }
}
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    /logout (GET)
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Request:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
// Solo espera el token en la cabecera
                                    </code></pre>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Response:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
{
    "message": [
        "Deslogueo exitoso"
    ]
}
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    /register (POST)
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Request:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
{
    name: 'Pablo Contreras',
    password: '123456',
    email: 'pacg1991@gmail.com',
    nickname: 'bypabloc',
}
                                    </code></pre>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Response:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
{
    "data": {
        "token": "46|B5qHKKBjn7oiKAIcbYvxg1A2jgjeTxxiyKFBSXrm",
        "name": "Pablo Contreras",
        "nickname": "bypabloc",
        "email": "pacg1991@gmail.com"
    }
}
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    /users (GET)
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Request:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
// Solo espera el token en la cabecera
                                    </code></pre>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Response:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
{
    "data": [
        {
            "name": "Josirma Tortolero",
            "email": "joshipuedo@gmail.com",
            "tweets": [
                {
                    "id": 123,
                    "text": "HolaMundo",
                    "user_id": 11,
                    "created_at": "2021-07-04T06:19:19.000000Z",
                    "updated_at": "2021-07-04T06:19:19.000000Z"
                }
            ]
        },
        {
            "name": "Pablo Contreras",
            "email": "pacg1991@gmail.com",
            "tweets": [
                {
                    "id": 19,
                    "text": "See how eagerly the lobsters to the little golden key in the same thing as \"I sleep when I was thinking I should have croqueted the Queen's absence, and were resting in the middle, wondering how she.",
                    "user_id": 1,
                    "created_at": "2021-07-02T21:19:50.000000Z",
                    "updated_at": "2021-07-02T21:19:50.000000Z"
                },
                {
                    "id": 40,
                    "text": "They're dreadfully fond of pretending to be two people. 'But it's no use now,' thought Alice, 'to pretend to be patted on the stairs. Alice knew it was her dream:-- First, she dreamed of little.",
                    "user_id": 1,
                    "created_at": "2021-07-02T21:19:50.000000Z",
                    "updated_at": "2021-07-02T21:19:50.000000Z"
                },
            ]
        }
    ],
    "links": {
        "first": "https://bypabloc-twitter-api.herokuapp.com/api/v1/users?page=1",
        "last": "https://bypabloc-twitter-api.herokuapp.com/api/v1/users?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "https://bypabloc-twitter-api.herokuapp.com/api/v1/users?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "https://bypabloc-twitter-api.herokuapp.com/api/v1/users",
        "per_page": 15,
        "to": 12,
        "total": 12
    }
}
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    /tweets (GET)
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Request:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
// Solo espera el token en la cabecera
                                    </code></pre>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Response:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
{
    "data": [
        {
            "text": "Mock Turtle yet?' 'No,' said the Mock Turtle in a very melancholy voice. 'Repeat, \"YOU ARE OLD, FATHER WILLIAM,\"' said the Gryphon. 'Of course,' the Mock Turtle, suddenly dropping his voice; and.",
            "created_by": {
                "name": "Macy Kessler",
                "email": "ibrekke@example.net",
                "nickname": "brekke.bridgette"
            },
            "created_at": "2021-07-02T21:19:51.000000Z"
        },
        {
            "text": "I eat or drink under the sea--' ('I haven't,' said Alice)--'and perhaps you haven't found it made no mark; but he now hastily began again, using the ink, that was linked into hers began to feel a.",
            "created_by": {
                "name": "Julian Mraz",
                "email": "marguerite.windler@example.org",
                "nickname": "bsmitham"
            },
            "created_at": "2021-07-02T21:19:51.000000Z"
        },
        {
            "text": "Knave of Hearts, carrying the King's crown on a crimson velvet cushion; and, last of all the jurors were writing down 'stupid things!' on their faces, so that it might happen any minute, 'and then,'.",
            "created_by": {
                "name": "Yesenia Nicolas",
                "email": "kuhlman.madonna@example.org",
                "nickname": "sheila44"
            },
            "created_at": "2021-07-02T21:19:51.000000Z"
        },
        {
            "text": "Duchess, 'and that's why. Pig!' She said this last remark, 'it's a vegetable. It doesn't look like it?' he said. (Which he certainly did NOT, being made entirely of cardboard.) 'All right, so far,'.",
            "created_by": {
                "name": "Frederic Ruecker",
                "email": "ardith.hermiston@example.com",
                "nickname": "blair32"
            },
            "created_at": "2021-07-02T21:19:51.000000Z"
        },
    ],
    "links": {
        "first": "http://twitter-api.prueba/api/v1/tweets?page=1",
        "last": "http://twitter-api.prueba/api/v1/tweets?page=7",
        "prev": null,
        "next": "http://twitter-api.prueba/api/v1/tweets?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 7,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://twitter-api.prueba/api/v1/tweets?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://twitter-api.prueba/api/v1/tweets?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://twitter-api.prueba/api/v1/tweets?page=3",
                "label": "3",
                "active": false
            },
        ],
        "path": "http://twitter-api.prueba/api/v1/tweets",
        "per_page": 15,
        "to": 15,
        "total": 101
    }
}
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    /tweets/new_tweet (POST)
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Request:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
{
    text: 'Nuevo twitter',
}
                                    </code></pre>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="ml-4 text-base leading-7 font-semibold">
                                    Response:
                                </div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <pre><code>
{
    "data": {
        "tweet": {
            "text": "Texto 1",
            "user_id": 1,
            "updated_at": "2021-07-04T07:40:55.000000Z",
            "created_at": "2021-07-04T07:40:55.000000Z",
            "id": 124
        }
    }
}
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
