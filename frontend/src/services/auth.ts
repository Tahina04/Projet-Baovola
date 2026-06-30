import axios from 'axios';
import { AuthResponse, User } from '@/types';

const API_BASE_URL = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:8080/api';

const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
  },
  withCredentials: true,
});

export const authService = {
  register: async (data: { nom: string; prenom: string; email: string; password: string }): Promise<AuthResponse> => {
    const response = await api.post('/register', data);
    return response.data;
  },

  login: async (data: { email: string; password: string }): Promise<AuthResponse> => {
    const response = await api.post('/login', data);
    return response.data;
  },

  logout: async (): Promise<AuthResponse> => {
    const response = await api.post('/logout');
    return response.data;
  },
};