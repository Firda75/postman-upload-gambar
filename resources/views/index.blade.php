<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/mqtt/dist/mqtt.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .hidden {
            display: none;
        }
        .show {
            display: block;
            
        }
        .bg-dashboard {
    position: relative;
    background-image: url('img/sky3.JPG'); /* Ganti dengan URL gambar yang sesuai */
    background-size: cover;
    background-position: center;
}

.bg-dashboard::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.1); /* Warna hitam dengan opacity 50% */
}




    </style>
  </head>
    <title>HELLO</title>
</head>
<body class="flex h-screen bg-gray-400">
    

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-black flex flex-col left-[-300px]">
       
        <div class="p-4 bg-indigo-400 flex items-center">
            <button type="button" class="flex items-center bg-white p-2 rounded-full text-black-400 hover:text-white focus:outline-none">
                <img class="h-8 w-8 rounded-full" src="img/profile.PNG" alt="">
            </button>
            <h2 class="block px-4 py-4 font-bold text-white rounded-md">Halo, Admin</h2>
            <div class="relative inline-block text-left"><div>
                <button type="button" class="inline-flex w-full justify-left gap-x-0.5 rounded-md px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-100" id="menu-button" aria-expanded="false" aria-haspopup="true">
                <i class="bi bi-caret-down-square-fill"></i>
                </button>
            </div>

      <!-- Dropdown menu -->
      <div id="dropdown-menu" class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-slate-950 shadow-lg ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1" role="none">
          <a href="#" class="block px-4 py-2 text-white rounded-md hover:bg-gray-700 hover:text-cyan-300" role="menuitem" tabindex="-1" id="menu-item-0"><i class="bi bi-gear-fill"></i> Account settings</a>
          <a href="#" class="block px-4 py-2 text-white rounded-md hover:bg-gray-700 hover:text-cyan-300" tabindex="-1" id="menu-item-1"><i class="bi bi-star-fill"></i> Support</a>
          <a href="#" class="block px-4 py-2 text-white rounded-md hover:bg-gray-700 hover:text-cyan-300" tabindex="-1" id="menu-item-2"><i class="bi bi-file-earmark-text-fill"></i> License</a>
          <form method="POST" action="#" role="none">
            <button type="submit" class="block px-4 py-2 text-white rounded-md hover:bg-red-700 hover:text-white" role="menuitem" tabindex="-1" id="menu-item-3"><i class="bi bi-box-arrow-left"></i> Sign out</button>
          </form>
        </div>
      </div>
    </div>
        </div>
        <nav class="flex-1 p-4">
            <ul class="space-y-2 text-white">
                <li>
                <a href="#" class="block px-4 py-2 rounded-md bg-indigo-500 hover:bg-indigo-700 hover:text-cyan-300"><i class="bi bi-house-door-fill"> </i>Dashboard
                </a>
                </li>
                <li>
                    <a href="#" id="mqtt-menu" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-cyan-300"><i class="bi bi-database-fill"> </i>MQTT</a>
                </li>
                <li>
                
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-cyan-300"><i class="bi bi-people-fill"> </i>Team</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-cyan-300"><i class="bi bi-bar-chart-line-fill"> </i>Statisticts</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-cyan-300"><i class="bi bi-calendar-heart-fill"> </i>Calendar Activity</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 rounded-md hover:bg-gray-700 hover:text-cyan-300"><i class="bi bi-person-rolodex"> </i>Contact Us</a>
                </li>
            </ul>
        </nav>
        <div class="p-4 bg-indigo-400 flex items-center justify-between">
            <button type="button" class="bg-gray-800 p-2 rounded-full text-white hover:text-cyan-300 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
            </button>  
            
            <button type="button" class="flex px-2 py-2 text-white items-center bg-gray-800 p-2 rounded-md text-black-400 hover:text-cyan-300 focus:outline-none">
                <h2 class="text-white px-2"> Light </h2>
                <h1><i class="bi bi-toggle-on"> </i></h1>
                <h2 class="text-white px-2">  Dark</h2>
            </button>
            
        </div>
    </aside> 
    <!-- Main Content -->
    <div class="flex flex-col min-h-screen">
    <div class="flex-1 flex justify-center items-center p-4 bg-dashboard bg-no-repeat bg-cover opacity-100">
        <div class="text-center" style="z-index:2;">
            <h1 class="text-5xl text-white font-bold">Dashboard Our Project</h1>
            <p class="text-white">Track our Projects, Tasks & our team activity here</p>
        </div>
    </div>



        <div class="flex flex-row p-4 space-x-4 bg-gray-300">
            <div class="flex-1 rounded-md h-64 w-64 p-4 bg-indigo-400">
                <!-- Main content will go here -->
                <h1 class="text-white text-2xl text-center font-bold">Welcome</h1>
                <hr class="border-t-4 border-cyan-300 my-2"></hr>
                <p class="text-white font-semibold">Welcome to our dashboard, in here .......</p>
            </div>
            <div class="flex-1 rounded-md h-64 w-64 p-4 bg-white">
                <!-- Main content will go here -->
                <h1 class="text-black text-center font-bold text-2xl">Our Activity</h1>
                <hr class="border-t-4 border-cyan-300 my-2"></hr>
                <h2 class="font-semibold"><i class=" bi bi-router-fill me-2" style="font-size: 30px;"></i>Internet Of Things (IoT)</h2>
                <h2 class="font-semibold"><i class="bi bi-gear-wide-connected" style="font-size: 30px;"> </i> Mechanical Engineering</h2>
                <h2 class="font-semibold"><i class="bi bi-file-earmark-code-fill" style="font-size: 30px;"></i> Software Engineering</h2>
                <h2 class="font-semibold"><i class="bi bi-lightning-fill" style="font-size: 30px;"></i> Electrical Engineering</h2>  
                

                
            </div>
            <div class="flex-1 rounded-md h-64 w-64 p-4 bg-white">
                <!-- Main content will go here -->
                <h1 class=" text-2xl text-center text-black font-bold">780</h1>
                <hr class="border-t-4 border-cyan-300 my-2"></hr>
            </div>
            <div class="flex-1 rounded-md h-64 w-64 p-4 bg-red-400">
                <!-- Main content will go here -->
                <h1 class="text-white text-center text-2xl font-bold">Lorem</h1>
                <hr class="border-t-4 border-cyan-300 my-2"></hr>
            </div>
        </div>
    </div>

    <!-- MQTT Sidebar Section --> 
    <aside id="mqtt-sidebar" style="z-index:2;" class="cover fixed top-0 left-64 w-full h-screen bg-gray-200 p-4 hidden">
    <h2 class="text-lg text-black font-bold mb-4">MQTT Status</h2>
    <div class="flex flex-row space-x-20">

    
    <div class="flex flex-col space-x-4">
    <div id="messages" class="flex shadow-lg shadow-indigo-800 text-3xl justify-center items-center rounded-md h-32 w-64 p-4 text-white font-bold bg-indigo-400"></div>
    <div id="status" class="flex-row p-2 font-bold mb-4"></div>
    <button id="close-mqtt" class="mt-4 px-2 py-2 bg-red-500 w-16 text-white rounded">Close</button>
    
</div>

    
<div class="flex flex-row space-x-20">
    <div id="" class="flex justify-center items-center rounded-md h-32 w-64 p-4 text-white shadow-lg shadow-gray-800 font-bold bg-white"></div>
    <div class="flex text-3xl bg-white shadow-lg shadow-gray-800 font-bold rounded-md h-96 w-96">
        <h1 class="text-center px-4 py-2">INI KOTAK</h1>
        <hr class="border-t-4 border-cyan-300"></hr>
    </div> <!-- Ubah ukuran kotak terakhir menjadi lebih panjang -->
</div>
</div>
    
 
    
    
    
</aside>


    <!-- MQTT Script -->
    <script>
    // Broker configuration
    const mqttServer = 'wss://mqtt-dashboard.com:8884/mqtt'; // WebSocket URL
    const mqttUser = 'bejo'; // MQTT Username
    const mqttPassword = 'bejokun'; // MQTT Password
    const topic = 'topik/bebas'; // MQTT Topic

    // Create a client instance
    const client = mqtt.connect(mqttServer, {
        username: mqttUser,
        password: mqttPassword,
        reconnectPeriod: 1000,
    });

    // Update status indicator
    function updateStatus(message, color) {
        const statusElement = document.getElementById('status');
        statusElement.innerHTML = message;
        statusElement.className = `mt-4 p-2 text-left font-bold ${color}`;
    }

    // Connect event
    client.on('connect', () => {
        console.log('Connected to MQTT broker');
        updateStatus('Connected to MQTT broker', 'text-green-500');
        client.subscribe(topic, (err) => {
            if (!err) {
                console.log(`Subscribed to topic ${topic}`);
            } else {
                console.error('Subscription error:', err);
            }
        });
    });

    // Message event
    client.on('message', (topic, message) => {
        const msg = message.toString();
        console.log(`Received message: ${msg}`);
        // Show only the latest message
        const messagesDiv = document.getElementById('messages');
        messagesDiv.innerHTML = `<p>${msg}</p>`; // Replace previous message with the latest one
    });

    // Error event
    client.on('error', (err) => {
        console.error('Connection error:', err);
        updateStatus('Not connected to MQTT broker', 'text-red-500');
    });

    // Offline event (when client loses connection)
    client.on('offline', () => {
        console.log('MQTT client is offline');
        updateStatus('Not connected to MQTT broker', 'text-red-500');
    });

    // End event (when client is disconnected)
    client.on('close', () => {
        console.log('MQTT client connection closed');
        updateStatus('Not connected to MQTT broker', 'text-red-500');
    });

    // Toggle MQTT sidebar visibility
    document.getElementById('mqtt-menu').addEventListener('click', () => {
        document.getElementById('mqtt-sidebar').classList.toggle('hidden');
    });

    // Close MQTT sidebar
    document.getElementById('close-mqtt').addEventListener('click', () => {
        document.getElementById('mqtt-sidebar').classList.add('hidden');
    });

    document.addEventListener('DOMContentLoaded', () => {
        const button = document.getElementById('menu-button');
        const dropdownMenu = document.getElementById('dropdown-menu');

        button.addEventListener('click', () => {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';

            // Toggle the visibility of the dropdown menu
            if (isExpanded) {
                dropdownMenu.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
            } else {
                dropdownMenu.classList.remove('hidden');
                button.setAttribute('aria-expanded', 'true');
            }
        });

        // Close the dropdown if clicked outside
        document.addEventListener('click', (event) => {
            if (!button.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
            }
        });
    });
</script>

</body>
</html>

