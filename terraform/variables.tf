variable "project_id" {
  description = "The GCP project ID"
  type        = string
}

variable "region" {
  description = "The region to deploy the resources"
  type        = string
  default     = "us-central1"
}

variable "zone" {
  description = "The zone to deploy the resources"
  type        = string
  default     = "us-central1-a"
}

variable "machine_type" {
  description = "The machine type for the spot VM"
  type        = string
  default     = "e2-medium"
}
