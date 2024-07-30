<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Questionnaire
        </h2>
    </x-slot>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: auto;
            margin-top: 50px; /* Added margin-top to move the container down */
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            appearance: none;
            background-color: #fff;
            cursor: pointer;
        }
        .button-container {
            display: flex;
            justify-content: center;
        }
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #5cb85c;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>

    <div class="container">
        <h1>Job Info</h1>

        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('questionnaire.store') }}" method="POST">
            @csrf
            <div>
                <label for="department">Department:</label>
                <select id="department" name="department" required>
                    <option value="" disabled selected>Select a department</option>
                    <option value="Ar-Ge">Ar-Ge</option>
                    <option value="Information Technologies">Information Technologies</option>
                    <option value="Quality Assurance">Quality Assurance</option>
                    <option value="Manufacturing">Manufacturing</option>
                    <option value="PLM">PLM</option>
                </select>
            </div>
            <div>
                <label for="degree">Degree:</label>
                <select id="degree" name="degree" required>
                    <option value="" disabled selected>Select a degree</option>
                    <option value="Computer Engineering">Computer Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Chemical Engineering">Chemical Engineering</option>
                </select>
            </div>
            <div class="button-container">
                <button type="submit">Submit</button>
            </div>
        </form>

        @if ($errors->any())
            <div class="message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>
