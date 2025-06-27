// Common Web3 utility functions (e.g., connect wallet, web3 provider setup)
async function connectWallet() {
    if (window.ethereum) {
        try {
            const accounts = await window.ethereum.request({ method: 'eth_requestAccounts' });
            console.log('Connected account:', accounts[0]);
            return accounts[0];
        } catch (error) {
            console.error('User denied account access or other error:', error);
            return null;
        }
    } else {
        alert('MetaMask is not installed. Please install it to use this feature.');
        return null;
    }
}

// Function to call a module's API
async function callModuleApi(moduleName, action, params = {}) {
    const query = new URLSearchParams(params).toString();
    const response = await fetch(`${APP_URL}/modules/${moduleName}/api.php?action=${action}&${query}`);
    return response.json();
}

