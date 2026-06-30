// Type definitions for the application
export interface User {
  id?: number;
  nom: string;
  prenom: string;
  email: string;
  password?: string;
}

export interface AuthResponse {
  success: boolean;
  message?: string;
  user?: User;
  errors?: Record<string, string>;
}