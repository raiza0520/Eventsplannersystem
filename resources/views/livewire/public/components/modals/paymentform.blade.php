<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3"> 
                <?php
                 if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
                        header('Access-Control-Allow-Origin: *');
                        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
                        header('Access-Control-Allow-Headers: token, Content-Type');
                        header('Access-Control-Max-Age: 1728000');
                        header('Content-Length: 0');
                        header('Content-Type: text/plain');
                        die();
                    }
                header('Access-Control-Allow-Origin: *');

                $servername = "156.67.222.1";
                $username = "u962392351_danis";
                $password = "o^d:3UY8";
                $dbname = "u962392351_danis";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                date_default_timezone_set('Asia/Manila');
                ?>
                <style>
                    
                    
                input[type=text], input[type=file],input[type=email],input[type=number], select {
                  width: 100%;
                  padding: 12px 20px;
                  margin: 8px 0;
                  display: inline-block;
                  border: 1px solid #ccc;
                  border-radius: 4px;
                  box-sizing: border-box;
                }

                </style>
                    <h3 class="font-semibold mb-3">Down Payment</h3>
                        <div class=" bg-yellow-300 rounded-md" style="padding:10px">
                            <center>
                                <span class="w-2/5 ml-3">Name:</span><br>
                                    <input type="text" wire:model="name" required>
                                    @error('name')
                                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                    @enderror
                                    <br>
                                        <span class="w-2/5 ml-3">Amount:</span><br>
                                            <input type="number" wire:model="amount" required>
                                            @error('amount')
                                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                            @enderror
                                    <br>
                                        <span class="w-2/5 ml-3">Reference No.:</span><br>
                                            <input type="text" wire:model="ref" required>
                                            @error('ref')
                                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                            @enderror
                                    <br>
                                        <span class="w-2/5 ml-3">Receipt:</span><br>
                                            <input type="file" class="flex-1 border-none" wire:model="file">
                                            @error('file')
                                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                            @enderror
                                    <br>
                                        <span class="w-2/5 ml-3">Email:</span><br>
                                            <input type="email" wire:model="email" required >
                                            @error('email')
                                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                                            @enderror
                                    <br>
                                        <button class="bg-black rounded-md px-3 py-1" style="color:#FFF;text-align:center" wire:click="update">Submit Down Payment</button>
                                    </center>
                                    <h3 style="color:#000;font-weight:bold">Administrator Account</h3>
                                   
                                    <?php
                                    


                $r = mysqli_query($conn, "SELECT * FROM banks");
                while($row = mysqli_fetch_array($r)) {
                    
                    echo '<li><b>Account: </b>'.$row['name'].'<br>';
                    echo '<b>Account Name: </b>'.$row['account_name'].'<br>';
                    echo '<b>Account Number: </b>'.$row['account_number'].'</li>';
                    echo '<hr>';
                    echo '</tr>';
                }
                                    
                                    ?>
                                    </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-between">
                <button class="border rounded-lg px-3 py-1" x-on:click="{{ $modal }} = false">
                    <div class="flex items-center gap-3">
                        <span>Close</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>
                                    <script>
                                        
                				
                const fileInput = document.getElementById('upload');
                fileInput.addEventListener('change', (e) => {
                // get a reference to the file
                const file = e.target.files[0];

                // encode the file using the FileReader API
                const reader = new FileReader();
                reader.onloadend = () => {

                    // use a regex to remove data url part
                    const base64String = reader.result;
                        document.getElementById('file').value =reader.result; 
                    console.log(base64String);
                };
                reader.readAsDataURL(file);});
                                    </script>