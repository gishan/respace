<template>
    <div className="min-h-screen bg-gray-50">
      <!-- Hero Section  -->
      <div className="bg-white shadow-sm">
        <div className="container mx-auto px-4 py-8">
          <h1 className="text-4xl font-bold mb-2">The Innovation Hub</h1>
          <div className="flex items-center text-gray-600 mb-4">
            <MapPin className="w-5 h-5 mr-2" />
            <span>123 Creative Street, Innovation District</span>
          </div>
          <p className="text-lg text-gray-600">
            A premium venue for innovative brand experiences and product launches.
          </p>
        </div>
      </div>

      <!-- Main Content  -->
      <div className="container mx-auto px-4 py-8">
          <!-- Product Launch Section  -->
        <div className="bg-white rounded-lg shadow-md p-6 mb-8">
          <div className="flex justify-between items-start mb-6">
            <div>
              <h2 className="text-2xl font-bold mb-2">Product Launch</h2>
              <p className="text-gray-600">Space: Main Event Hall</p>
            </div>
            <div className="text-right">
              <p className="text-3xl font-bold">$2500</p>
              <p className="text-gray-600">per day</p>
              <p className="text-brand-red">Up to 100 people</p>
            </div>
          </div>
          
          <p className="mb-4">Comprehensive launch event with full venue support and marketing setup.</p>
          
          <div className="flex flex-wrap gap-2 mb-6">
            <span className="px-4 py-2 bg-gray-100 rounded-full">Professional AV Setup</span>
            <span className="px-4 py-2 bg-gray-100 rounded-full">Catering Area</span>
            <span className="px-4 py-2 bg-gray-100 rounded-full">Brand Placement Zones</span>
            <span className="px-4 py-2 bg-gray-100 rounded-full">Technical Support</span>
          </div>

          <button className="w-full bg-brand-red text-white py-3 rounded-lg hover:bg-brand-red">
            Request to Book
          </button>

          <div className="grid grid-cols-3 gap-4 mt-6">
            <div className="bg-gray-200 aspect-[3/2] rounded-lg"></div>
            <div className="bg-gray-200 aspect-[3/2] rounded-lg"></div>
            <div className="bg-gray-200 aspect-[3/2] rounded-lg"></div>
          </div>
        </div>

          <!-- Private Office Section  -->
        <div className="bg-white rounded-lg shadow-md p-6 mb-8">
          <div className="flex justify-between items-start mb-6">
            <div>
              <h2 className="text-2xl font-bold mb-2">Private Office</h2>
              <p className="text-gray-600">Fully furnished private office for teams up to 4 people</p>
            </div>
            <div className="text-right">
              <p className="text-lg font-bold text-brand-red">$50/day</p>
              <p className="text-gray-600">$500/month</p>
            </div>
          </div>

          <div className="grid grid-cols-3 gap-4 mb-4">
            <div className="bg-gray-200 aspect-[3/2] rounded-lg"></div>
            <div className="bg-gray-200 aspect-[3/2] rounded-lg"></div>
            <div className="bg-gray-200 aspect-[3/2] rounded-lg"></div>
          </div>

          <ul className="grid grid-cols-2 gap-4">
            <li className="flex items-center text-gray-600"><div className="w-2 h-2 bg-brand-red rounded-full mr-2"></div>4 ergonomic chairs</li>
            <li className="flex items-center text-gray-600"><div className="w-2 h-2 bg-brand-red rounded-full mr-2"></div>Adjustable desk</li>
            <li className="flex items-center text-gray-600"><div className="w-2 h-2 bg-brand-red rounded-full mr-2"></div>Private AC control</li>
            <li className="flex items-center text-gray-600"><div className="w-2 h-2 bg-brand-red rounded-full mr-2"></div>Soundproof walls</li>
          </ul>
        </div>

          <!-- Opening Hours  -->
        <div className="bg-white rounded-lg shadow-md p-6 mb-8">
          <div className="flex items-start gap-4">
            <Clock className="w-6 h-6 text-brand-red" />
            <div>
              <h2 className="text-xl font-bold mb-2">Opening Hours</h2>
              <p className="text-gray-600">Weekdays: 6:00 AM - 10:00 PM</p>
              <p className="text-gray-600">Weekends: 8:00 AM - 6:00 PM</p>
            </div>
          </div>
        </div>

          <!-- Amenities  -->
        <div className="bg-white rounded-lg shadow-md p-6 mb-8">
          <h2 className="text-xl font-bold mb-4">Amenities</h2>
          <div className="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div className="flex items-center gap-2">
              <Wifi className="w-5 h-5 text-brand-red" />
              <span>High-speed WiFi</span>
            </div>
            <div className="flex items-center gap-2">
              <Coffee className="w-5 h-5 text-brand-red" />
              <span>Coffee & Tea</span>
            </div>
            <div className="flex items-center gap-2">
              <Printer className="w-5 h-5 text-brand-red" />
              <span>Print Center</span>
            </div>
            <div className="flex items-center gap-2">
              <Clock className="w-5 h-5 text-brand-red" />
              <span>24/7 Access</span>
            </div>
            <div className="flex items-center gap-2">
              <Calendar className="w-5 h-5 text-brand-red" />
              <span>Meeting Rooms</span>
            </div>
            <div className="flex items-center gap-2">
              <Phone className="w-5 h-5 text-brand-red" />
              <span>Phone Booths</span>
            </div>
          </div>
        </div>

          <!-- Terms & Policies  -->
        <div className="bg-white rounded-lg shadow-md p-6">
          <h2 className="text-xl font-bold mb-4">Terms & Conditions</h2>
          <div className="space-y-4">
            <div>
              <h3 className="font-semibold mb-2">Booking Policy</h3>
              <p className="text-gray-600">Minimum booking duration applies. Cancellations must be made 24 hours in advance.</p>
            </div>
            <div>
              <h3 className="font-semibold mb-2">House Rules</h3>
              <p className="text-gray-600">Please maintain a professional environment. No smoking. Guests must be registered.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

</template>