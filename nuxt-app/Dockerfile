# Base image (Debian-based)
FROM node:20.9.0-bullseye-slim

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    git \
    && rm -rf /var/lib/apt/lists/*

# Create app directory
WORKDIR /app

# Copy package files
COPY package*.json ./

# Install dependencies
RUN npm install

# Copy project files
COPY . .

# Build the app
RUN npm run build

# Expose the port the app runs on
EXPOSE 3000

# Start the application
CMD ["npm", "run", "start"]
