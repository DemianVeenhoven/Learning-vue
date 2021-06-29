<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create project</title>
    </head>
    <body>
        <h1>Create a new project</h1>
        <div class="nav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/skills">Skills</a></li>
                <li><a href="/projects/create">Create new project</a></li>
            </ul>
        </div>
        <br>
       
        <div id="app">
            <form method="POST" action="/projects" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                @csrf
                <div class="control">
                    <label for="name" class="label">Project name:</label>
                    <input type="text" id="name" name="name" class="input" v-model="form.name"></input>
                    <br>

                    <span v-if="form.errors.has('name')" v-text="form.errors.get('name')" style="color:red;"></span>
                </div>
                <br>

                <div class="control">
                    <label for="description" class="label">Project description:</label>
                    <input type="text" id="description" name="description" class="input" v-model="form.description"></input>
                    <br>

                    <span v-if="form.errors.has('description')" v-text="form.errors.get('description')" style="color:red;"></span>
                </div>

                <div class="control">
                    <button class="button-is-primary" :disabled="form.errors.any()">Create</button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="/js/create_projects.js"></script>
    </body>
</html>