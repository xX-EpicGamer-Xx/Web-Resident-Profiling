<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Analytics Dashboard</title>
    <style>
        html, body {
    height: 100%;
    margin: 0;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(-45deg, #08110E, #3F6656 );
}

.main-tab {
    width: 94.79%;
    height: 90.74%;
    border-left: 1px solid #57977C;
    border-right: 1px solid #57977C;
    border-bottom: 1px solid #57977C;
    border-top: 100px solid #57977C; /* Top border as percentage of height */
    box-sizing: border-box;
    border-radius: 50px;
    background: transparent;
}

.separator {
    position: absolute;
    left: 10px; /* space from the left edge inside the rectangle */
    top: 50%;
    left: 10%;
    transform: translateY(-45%);
    width: 1px;
    height: 70%;
    background-color: #57977C;
}

#dashboard-tab {
    position: absolute;
    top: 20%; /* slight offset from the top */
    left: 4.5%;
    width: 75px;
    object-fit: cover;
    height: 75px;
    background-color: transparent;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    background-image: url('images/dashboard.png');
}

#analytics-tab {
    position: absolute;
    top: 35%; /* slight offset from the top */
    left: 4.5%;
    width: 75px;
    object-fit: cover;
    height: 75px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    background-image: url('images/analytics(clicked).png');
    background-color: transparent;
    z-index: 1;
}

#database-tab {
    position: absolute;
    top: 50%; /* slight offset from the top */
    left: 4.5%;
    width: 75px;
    object-fit: cover;
    height: 75px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    background-image: url('images/table.png');
    background-color: transparent;
}

#filing-tab {
    position: absolute;
    top: 65%; /* slight offset from the top */
    left: 4.5%;
    width: 75px;
    object-fit: cover;
    height: 75px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    background-image: url('images/filing.png');
    background-color: transparent;
}

#user-account-tab {
    position: absolute;
    top: 85%; /* slight offset from the top */
    left: 4.5%;
    object-fit: cover;
    width: 75px;
    height: 75px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    background-image: url('images/user-account.png');
    background-color: transparent;
}

.shade {
    position: absolute;
    top: 32.5%; /* slight offset from the top */
    left: 2.7%;
    width: 7.3%;
    height: 12%;
    box-sizing: border-box;
    background: rgba(0, 0, 0, 0.5);
    z-index: 0;
}

.sex-ratio {
    position: absolute;
    top: 20%;
    left: 15%;
    width: 20%;
    height: 35%;
    border: 1px solid #57977C;
    box-sizing: border-box;
    border-radius: 50px;
    background: transparent;
    z-index: 12; /* above everything else */
}

.resident-number {
    position: absolute;
    top: 20%;
    left: 40%;
    width: 20%;
    height: 35%;
    border: 1px solid #57977C;
    box-sizing: border-box;
    border-radius: 50px;
    background: transparent;
    z-index: 1; /* above everything else */
}

.age-range {
    position: absolute;
    top: 62%;
    left: 15%;
    width: 45%;
    height: 27%;
    border: 1px solid #57977C;
    box-sizing: border-box;
    border-radius: 50px;
    background: transparent;
    z-index: 1; /* above everything else */
}

.sorting-system {
    position: absolute;
    top: 28%; /* Adjusted to accommodate both dropdowns and their labels */
    left: 64%;
    width: 28%;
    height: 61%; /* Adjusted height */
    border: 1px solid #57977C;
    box-sizing: border-box;
    border-radius: 50px;
    background: transparent;
    z-index: 1; /* above everything else */
    overflow-y: auto; /* Enable scrolling */
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.sorting-system::-webkit-scrollbar {
    display: none;
}

.sex-ratio-text {
    position: absolute;
    top: 17%;
    left: 17%;
    color: #ffffff;
    font-size: 20px;
    font-weight: 300; /* very bold */
    font-family: 'Inter', sans-serif; /* <-- use Inter */
    text-align: center;
    pointer-events: none;
    user-select: none;
    z-index: 10;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.resident-number-text {
    position: absolute;
    top: 17%;
    left: 42%;
    color: #ffffff;
    font-size: 20px;
    font-weight: 300; /* very bold */
    font-family: 'Inter', sans-serif; /* <-- use Inter */
    text-align: center;
    pointer-events: none;
    user-select: none;
    z-index: 10;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.family-number-text {
    position: absolute;
    top: 37%;
    left: 42%;
    color: #ffffff;
    font-size: 20px;
    font-weight: 300; /* very bold */
    font-family: 'Inter', sans-serif; /* <-- use Inter */
    text-align: center;
    pointer-events: none;
    user-select: none;
    z-index: 10;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.age-range-text {
    position: absolute;
    top: 59%;
    left: 17%;
    color: #ffffff;
    font-size: 20px;
    font-weight: 300; /* very bold */
    font-family: 'Inter', sans-serif; /* <-- use Inter */
    text-align: center;
    pointer-events: none;
    user-select: none;
    z-index: 10;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.resident-list {
    list-style-type: none; /* Remove bullet points */
    padding-left: 30px; /* Add some left padding */
    color: white; /* Make the text white */
    font-size: 18px; /* Make the text a little bigger */
    font-family: 'Inter', sans-serif; /* Ensure consistent font */
    padding-right: 20px; /* Add some right padding for scrollbar */
}
.resident-list li {
    margin-bottom: 10px; /* Add some spacing below each item */
    padding-bottom: 10px; /* Add some padding at the bottom */
    border-bottom: 1px solid #57977C; /* Add the separator line */
}

.resident-list li:last-child {
    border-bottom: none; /* Remove the separator from the last item */
}

.filter-dropdown {
    position: absolute;
    top: 16.3%;
    left: 76%;
    width: 12%;
    padding: 5px 10px;
    font-size: 16px;
    font-family: 'Inter', sans-serif;
    border-radius: 10px;
    border: 1px solid #57977C;
    background-color: transparent;
    color: white;
    z-index: 11;
    /* Custom arrow styling */
    -webkit-appearance: none; /* Remove default arrow for Webkit browsers */
    -moz-appearance: none;    /* Remove default arrow for Firefox */
    appearance: none;         /* Remove default arrow for other browsers */
    background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%23ffffff%22%20d%3D%22M4.5%204L6%205.5L7.5%204L8.5%205L6%207.5L3.5%205L4.5%204Z%22%2F%3E%3C%2Fsvg%3E');
    background-repeat: no-repeat;
    background-position: right 10px center; /* Position the arrow */
    padding-right: 30px; /* Make space for the arrow */
}

.filter-dropdown option {
    background-color: #08110E;
    color: white;
}

/* New Subdivision Label */
.subdivision-label {
    position: absolute;
    top: 21.5%; /* Positioned below Sorting System text */
    left: 66%;
    color: #ffffff;
    font-size: 20px;
    font-weight: 300;
    font-family: 'Inter', sans-serif;
    text-align: center;
    pointer-events: none;
    user-select: none;
    z-index: 10;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Custom Subdivision Dropdown Styles */
.custom-subdivision-dropdown {
    position: absolute;
    top: 21%; /* Positioned below the new Subdivision label */
    left: 76%; /* Aligned with the filter-dropdown */
    width: 12%; /* Matched width with filter-dropdown */
    z-index: 11;
    font-family: 'Inter', sans-serif;
}

.selected-subdivision-value {
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 10px;
    border: 1px solid #57977C;
    background-color: transparent;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* Custom arrow styling */
    -webkit-appearance: none; /* Remove default arrow for Webkit browsers */
    -moz-appearance: none;    /* Remove default arrow for Firefox */
    appearance: none;         /* Remove default arrow for other browsers */
    background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%23ffffff%22%20d%3D%22M4.5%204L6%205.5L7.5%204L8.5%205L6%207.5L3.5%205L4.5%204Z%22%2F%3E%3C%2Fsvg%3E');
    background-repeat: no-repeat;
    background-position: right 10px center; /* Position the arrow */
    padding-right: 30px; /* Make space for the arrow */
}

/* Removed ::after pseudo-element as arrow is now background-image */
.selected-subdivision-value::after {
    content: none;
}

.subdivision-options-list {
    display: none; /* Hidden by default */
    position: absolute;
    top: 100%; /* Position below the selected value */
    left: 0;
    width: 100%;
    border: 1px solid #57977C;
    border-top: none;
    border-radius: 0 0 10px 10px;
    background-color: #08110E;
    color: white;
    max-height: 200px; /* Limit height and enable scrolling */
    overflow-y: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 100; /* Ensure it's above other elements */
}

.subdivision-option {
    padding: 8px 10px;
    cursor: pointer;
    display: block; /* Make labels block-level for full clickable area */
}

.subdivision-option:hover {
    background-color: #3F6656; /* Highlight on hover */
}


.sorting-system-text {
    position: absolute;
    top: 17%;
    left: 66%;
    color: #ffffff;
    font-size: 20px;
    font-weight: 300; /* very bold */
    font-family: 'Inter', sans-serif; /* <-- use Inter */
    text-align: center;
    pointer-events: none;
    user-select: none;
    z-index: 10;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.residents-icon {
    position: absolute;
    top: 10%;
    left: 15%;
    width: 200px;
    height: 200px;
    object-fit: contain; /* or cover if you prefer full fill */
    z-index: 12; /* above everything else */
    margin: 15px; /* optional margin */
}

#residents-number {
    justify-content: center; /* horizontal */
    position: absolute;
    top: 75%;
    left: 45%;
    color: #57977C;
    font-size: 50px;
    font-weight: 900; /* very bold */
    font-family: 'Inter', sans-serif; /* <-- use Inter */
    text-align: center;
    pointer-events: none;
    user-select: none;
    z-index: 10;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

#genderChart {
    display: block;
    margin: 5% auto;
    max-width: 300px;
}

#ageChart {
    display: block;
    margin: 2% auto;
    max-width: 800px;
}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="main-tab">
        <div class="tab">
            <a href="dashboard.php">
                <button id="dashboard-tab"></button>
            </a>
            <a href="analytics.php">
                <button id="analytics-tab"></button>
            </a>
            <a href="index.php">
                <button id="database-tab"></button>
            </a>
            <a href="filing.php">
                <button id="filing-tab"></button>
            </a>
            <a href="user-account.php">
                <button id="user-account-tab"></button>
            </a>            
            <div class="shade"></div>
        </div>

        <label class="sex-ratio-text">Sex Ratio</label>
        <div class="sex-ratio">
            <canvas id="genderChart" width="300" height="300"></canvas>
        </div>

        <label class="resident-number-text">Number of Residents</label>
        <div class="resident-number">
            <img src="images/users.png" alt="residents" class="residents-icon" />
            <label id="residents-number">Loading...</label>
        </div>

        <label class="age-range-text">Age Range</label>
        <div class="age-range">
            <canvas id="ageChart" width="800" height="250"></canvas>
        </div>

        <label class="sorting-system-text">Sorting System</label>
        <select id="sortCriteria" class="filter-dropdown">
            <option value="all">-- All --</option>
            <option value="civilStatus">Civil Status</option>
            <option value="pwd">PWD</option>
            <option value="singleParent">Single Parent</option>
            <option value="fourPs">4Ps</option>
            <option value="voter">Voter</option>
        </select>

        <label class="subdivision-label">Subdivision</label>
        <div class="custom-subdivision-dropdown">
            <div class="selected-subdivision-value" id="selectedSubdivisionValue">-- All --</div>
            <div class="subdivision-options-list" id="subdivisionOptionsList">
                <label class="subdivision-option" data-value="all">-- All --</label>
                <label class="subdivision-option" data-value="Toclong Proper">Toclong Proper</label>
                <label class="subdivision-option" data-value="Acacia">Acacia</label>
                <label class="subdivision-option" data-value="Boston Heights - Phase 1">Boston Heights - Phase 1</label>
                <label class="subdivision-option" data-value="Boston Heights - Phase 2">Boston Heights - Phase 2</label>
                <label class="subdivision-option" data-value="Boston Heights - Phase 3">Boston Heights - Phase 3</label>
                <label class="subdivision-option" data-value="Boston Heights - Phase 4">Boston Heights - Phase 4</label>
                <label class="subdivision-option" data-value="Estrella Homes 4 - Phase 1">Estrella Homes 4 - Phase 1</label>
                <label class="subdivision-option" data-value="Estrella Homes 4 - Phase 2">Estrella Homes 4 - Phase 2</label>
                <label class="subdivision-option" data-value="Joshua Village">Joshua Village</label>
                <label class="subdivision-option" data-value="Kalayaan Homes">Kalayaan Homes</label>
                <label class="subdivision-option" data-value="Lakersfield">Lakersfield</label>
                <label class="subdivision-option" data-value="Malvar Subdivision">Malvar Subdivision</label>
                <label class="subdivision-option" data-value="Philhomes Ville">Philhomes Ville</label>
                <label class="subdivision-option" data-value="Pinagkaisa Village">Pinagkaisa Village</label>
                <label class="subdivision-option" data-value="Pinagkaloob">Pinagkaloob</label>
                <label class="subdivision-option" data-value="Rockwell">Rockwell</label>
            </div>
        </div>

        <div class="sorting-system">
            <ul class="resident-list">
            </ul>
        </div>

        <div class="separator"></div>
    </div>

     <script>
    let genderChartInstance = null;
    let ageChartInstance = null;

    const predefinedAddresses = [
        "Toclong Proper",
        "Acacia",
        "Boston Heights - Phase 1",
        "Boston Heights - Phase 2",
        "Boston Heights - Phase 3",
        "Boston Heights - Phase 4",
        "Estrella Homes 4 - Phase 1",
        "Estrella Homes 4 - Phase 2",
        "Joshua Village",
        "Kalayaan Homes",
        "Lakersfield",
        "Malvar Subdivision",
        "Philhomes Ville",
        "Pinagkaisa Village",
        "Pinagkaloob",
        "Rockwell"
    ];

    // Mock data for residents in case the fetch fails
    const mockResidents = [
        { name: "Ana Marie Santos", age: 32, sex: "female", address: "Joshua Village", civilStatus: "Single", pwd: 0, singleParent: 0, fourPs: 1, philhealth: 1, voter: 1 },
        { name: "John Paul Dela Cruz", age: 35, sex: "male", address: "Toclong Proper", civilStatus: "Married", pwd: 1, singleParent: 0, fourPs: 0, philhealth: 1, voter: 1 },
        { name: "Kristine Joy Ramirez", age: 62, sex: "female", address: "Kalayaan Homes", civilStatus: "Widowed", pwd: 0, singleParent: 1, fourPs: 1, philhealth: 0, voter: 0 },
        { name: "Michael Angelo Torres", age: 51, sex: "male", address: "Acacia", civilStatus: "Separated", pwd: 0, singleParent: 0, fourPs: 0, philhealth: 1, voter: 1 },
        { name: "Mary Grace Mendoza", age: 14, sex: "female", address: "Boston Heights - Phase 3", civilStatus: "Single", pwd: 0, singleParent: 0, fourPs: 1, philhealth: 1, voter: 0 },
        { name: "James Bryan Castillo", age: 60, sex: "male", address: "Joshua Village", civilStatus: "Married", pwd: 1, singleParent: 0, fourPs: 0, philhealth: 0, voter: 1 },
        { name: "Angelica Mae Navarro", age: 44, sex: "female", address: "Toclong Proper", civilStatus: "Single", pwd: 0, singleParent: 1, fourPs: 1, philhealth: 1, voter: 1 },
        { name: "Carl Vincent Soriano", age: 62, sex: "male", address: "Lakersfield", civilStatus: "Widowed", pwd: 0, singleParent: 0, fourPs: 0, philhealth: 1, voter: 0 },
        { name: "Sophia Garcia", age: 28, sex: "female", address: "Philhomes Ville", civilStatus: "Single", pwd: 0, singleParent: 0, fourPs: 1, philhealth: 1, voter: 1 },
        { name: "Daniel Reyes", age: 19, sex: "male", address: "Pinagkaisa Village", civilStatus: "Single", pwd: 1, singleParent: 0, fourPs: 0, philhealth: 0, voter: 1 },
        { name: "Olivia Cruz", age: 75, sex: "female", address: "Rockwell", civilStatus: "Widowed", pwd: 0, singleParent: 1, fourPs: 1, philhealth: 1, voter: 0 },
        { name: "Ethan Lopez", age: 48, sex: "male", address: "Pinagkaloob", civilStatus: "Married", pwd: 0, singleParent: 0, fourPs: 0, philhealth: 1, voter: 1 },
        { name: "Mia Fernandez", age: 22, sex: "female", address: "Boston Heights - Phase 1", civilStatus: "Single", pwd: 0, singleParent: 0, fourPs: 1, philhealth: 0, voter: 1 },
        { name: "Noah Martinez", age: 39, sex: "male", address: "Estrella Homes 4 - Phase 1", civilStatus: "Married", pwd: 1, singleParent: 0, fourPs: 0, philhealth: 1, voter: 1 },
        { name: "Isabella Perez", age: 55, sex: "female", address: "Malvar Subdivision", civilStatus: "Widowed", pwd: 0, singleParent: 1, fourPs: 1, philhealth: 1, voter: 0 }
    ];


    function getRandomAddress() {
        const randomIndex = Math.floor(Math.random() * predefinedAddresses.length);
        return predefinedAddresses[randomIndex];
    }

   function updateResidentList(residents) {
    const residentListUl = document.querySelector('.resident-list');
    if (residentListUl) {
        residentListUl.innerHTML = '';
        residents.forEach(resident => {
            const li = document.createElement('li');
            li.innerHTML = `
                <div class="resident-name">${resident.name}</div>
                <div class="resident-age">Age: ${resident.age}</div>
                <div class="resident-address">Address: ${resident.address || getRandomAddress()}</div>
            `;
            residentListUl.appendChild(li);
        });
    }
    const residentsNumberLabel = document.getElementById('residents-number');
    if (residentsNumberLabel) {
        residentsNumberLabel.textContent = residents.length;
    }
    updateGenderChart(residents);
    updateAgeChart(residents);
}

    function updateGenderChart(residents) {
        const maleCount = residents.filter(r => r.sex.toLowerCase() === 'male').length;
        const femaleCount = residents.filter(r => r.sex.toLowerCase() === 'female').length;
        const ctx = document.getElementById('genderChart').getContext('2d');

        if (genderChartInstance) {
            genderChartInstance.destroy();
        }

        genderChartInstance = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [maleCount, femaleCount],
                    backgroundColor: ['#57977C', '#3F6656'], // Using your theme's green colors
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                }
            }
        });
    }

    function updateAgeChart(residents) {
        const ageGroups = {};
        residents.forEach(resident => {
            const age = parseInt(resident.age);
            const decade = Math.floor(age / 10) * 10;
            const range = `${decade}-${decade + 9}`;
            ageGroups[range] = (ageGroups[range] || 0) + 1;
        });

        const labels = Object.keys(ageGroups).sort((a, b) => parseInt(a) - parseInt(b));
        const data = labels.map(label => ageGroups[label]);
        const ctx = document.getElementById('ageChart').getContext('2d');

        if (ageChartInstance) {
            ageChartInstance.destroy();
        }

        ageChartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Residents',
                    data: data,
                    backgroundColor: '#57977C', // Using your accent color
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            borderColor: '#57977C',
                            color: 'rgba(87, 151, 124, 0.2)'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'white'
                        },
                         grid: {
                            borderColor: '#57977C',
                            color: 'rgba(87, 151, 124, 0.2)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                }
            }
        });
    }

function filterResidentsByCriteria(residents, criteria) {
    if (criteria === 'all') {
        return residents;
    }
    return residents.filter(resident => {
        if (criteria === 'civilStatus' && resident.civil_status && parseInt(resident.age) >= 25) return true;
        if (criteria === 'pwd' && parseInt(resident.pwd) === 1) return true;
        if (criteria === 'singleParent' && parseInt(resident.single_parent) === 1) return true;
        if (criteria === 'fourPs' && parseInt(resident['4ps']) === 1) return true;
        if (criteria === 'voter' && parseInt(resident.voter) === 1 && parseInt(resident.age) >= 16) return true;
        return false;
    });
}

function updateResidentList(residents) {
    const residentListUl = document.querySelector('.resident-list');
    if (residentListUl) {
        residentListUl.innerHTML = '';
        residents.forEach(resident => {
            const li = document.createElement('li');
            li.innerHTML = `
                <div class="resident-name">${resident.name}</div>
                <div class="resident-age">Age: ${resident.age}</div>
                <div class="resident-address">Address: ${resident.address || getRandomAddress()}</div>
            `;
            residentListUl.appendChild(li);
        });
    }
    const residentsNumberLabel = document.getElementById('residents-number');
    if (residentsNumberLabel) {
        residentsNumberLabel.textContent = residents.length;
    }
    updateGenderChart(residents);
    updateAgeChart(residents);
}

const sortCriteriaDropdown = document.getElementById('sortCriteria');

function handleSortCriteriaChange(event) {
    const selectedCriteria = event.target.value;
    fetch('http://localhost/get_residents.php')
        .then(response => {
            if (!response.ok) {
                console.error(`HTTP error! status: ${response.status} from ${response.url}`);
                return Promise.reject(new Error(`HTTP error! status: ${response.status}`));
            }
            return response.json();
        })
        .then(data => {
            const filteredResidents = filterResidentsByCriteria(data, selectedCriteria);
            updateResidentList(filteredResidents);
        })
        .catch(error => {
            console.error('Error fetching residents:', error);
            const filteredMockResidents = filterResidentsByCriteria(mockResidents, selectedCriteria);
            updateResidentList(filteredMockResidents);
        });
}

sortCriteriaDropdown.addEventListener('change', handleSortCriteriaChange);

function filterResidentsBySubdivision(residents, subdivision) {
    if (subdivision === 'all') {
        return residents;
    }
    return residents.filter(resident => resident.address && resident.address.includes(subdivision));
}

const selectedSubdivisionValue = document.getElementById('selectedSubdivisionValue');
const subdivisionOptionsList = document.getElementById('subdivisionOptionsList');
const subdivisionOptions = document.querySelectorAll('.subdivision-option');

// Toggle dropdown visibility
selectedSubdivisionValue.addEventListener('click', () => {
    subdivisionOptionsList.style.display = subdivisionOptionsList.style.display === 'block' ? 'none' : 'block';
});

// Handle option selection for subdivision
subdivisionOptions.forEach(option => {
    option.addEventListener('click', () => {
        const selectedValue = option.dataset.value;
        selectedSubdivisionValue.textContent = option.textContent; // Update displayed value
        subdivisionOptionsList.style.display = 'none'; // Hide dropdown

        // Call filter function
        handleSubdivisionChange(selectedValue);
    });
});

// Close subdivision dropdown if clicked outside
document.addEventListener('click', (event) => {
    if (!event.target.closest('.custom-subdivision-dropdown')) {
        subdivisionOptionsList.style.display = 'none';
    }
});

function handleSubdivisionChange(selectedSubdivision) {
    fetch('http://localhost/get_residents.php')
        .then(response => {
            if (!response.ok) {
                console.error(`HTTP error! status: ${response.status} from ${response.url}`);
                return Promise.reject(new Error(`HTTP error! status: ${response.status}`));
            }
            return response.json();
        })
        .then(data => {
            const filteredResidents = filterResidentsBySubdivision(data, selectedSubdivision);
            updateResidentList(filteredResidents);
        })
        .catch(error => {
            console.error('Error fetching residents:', error);
            const filteredMockResidents = filterResidentsBySubdivision(mockResidents, selectedSubdivision);
            updateResidentList(filteredMockResidents);
        });
}

    // Initial load with "all" residents
    handleSubdivisionChange('all');

    // Also load all residents initially for the sorting dropdown
    fetch('http://localhost/get_residents.php')
        .then(response => {
            if (!response.ok) {
                console.error(`HTTP error! status: ${response.status} from ${response.url}`);
                return Promise.reject(new Error(`HTTP error! status: ${response.status}`));
            }
            return response.json();
        })
        .then(data => {
            updateResidentList(data);
        })
        .catch(error => {
            console.error('Error fetching residents on initial load:', error);
            updateResidentList(mockResidents);
        });
    </script>
</body>
</html>