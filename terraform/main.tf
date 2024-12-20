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
  project = var.project_id
  region  = var.region
  zone    = var.zone
}

# Create a frontend spot VM instance
resource "google_compute_instance" "frontend_spot_vm" {
  name         = "frontend-spot-vm"
  machine_type = var.machine_type
  
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
  tags = ["frontend-spot-instance"]

  metadata = {
    shutdown-script = "echo 'Shutting down'"
  }
}

# Output the frontend instance IP
output "frontend_instance_ip" {
  value = google_compute_instance.frontend_spot_vm.network_interface[0].access_config[0].nat_ip
}
