terraform {
  required_providers {
    google = {
      source  = "hashicorp/google"
      version = "~> 4.0"
    }
  }
}

# Configure the Google Cloud provider
provider "google" {
  # Replace with your project ID
  project = "YOUR_PROJECT_ID"
  region  = "us-central1"
  zone    = "us-central1-a"
}

# Create a spot VM instance
resource "google_compute_instance" "spot_vm" {
  name         = "spot-vm"
  machine_type = "e2-medium"
  
  # Spot VM configuration
  scheduling {
    preemptible       = true
    automatic_restart = false
    provisioning_model = "SPOT"
  }

  boot_disk {
    initialize_params {
      image = "debian-cloud/debian-11"
    }
  }

  network_interface {
    network = "default"
    access_config {
      # Include this empty block to give the VM an external IP address
    }
  }

  # Add any additional tags if needed
  tags = ["spot-instance"]

  metadata = {
    shutdown-script = "echo 'Shutting down'"
  }
}
