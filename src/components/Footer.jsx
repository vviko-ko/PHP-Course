import { Leaf } from 'lucide-react';
import { FaFacebookF, FaTwitter, FaLinkedinIn, FaInstagram } from 'react-icons/fa';

export default function Footer() {
  return (
    <footer className="bg-secondary text-white pt-12 md:pt-20 pb-8 md:pb-10">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12 mb-12 md:mb-16">
          
          <div className="mb-2 md:mb-0">
            <div className="flex items-center gap-3 mb-4 md:mb-6">
              <img src="/Images/logo-white.png" alt="EcoNeemTech Logo" className="h-8 md:h-10 w-auto" />
              <span className="text-xl md:text-2xl font-serif font-bold text-white">EcoNeemTech</span>
            </div>
            <p className="text-primary-light/70 leading-relaxed mb-6 text-sm md:text-base">
              Innovating for a cleaner, greener future through sustainable technology and action. Nature's Wisdom. Engineered for Modern Living.
            </p>
            <div className="flex gap-4">
              <a href="#" className="text-primary-light/70 hover:text-white transition-colors">
                <FaFacebookF size={18} className="md:w-5 md:h-5" />
              </a>
              <a href="#" className="text-primary-light/70 hover:text-white transition-colors">
                <FaTwitter size={18} className="md:w-5 md:h-5" />
              </a>
              <a href="#" className="text-primary-light/70 hover:text-white transition-colors">
                <FaLinkedinIn size={18} className="md:w-5 md:h-5" />
              </a>
              <a href="#" className="text-primary-light/70 hover:text-white transition-colors">
                <FaInstagram size={18} className="md:w-5 md:h-5" />
              </a>
            </div>
          </div>
          
          <div>
            <h4 className="text-base md:text-lg font-bold mb-4 md:mb-6">Quick Links</h4>
            <ul className="space-y-3 md:space-y-4 text-sm md:text-base">
              <li><a href="#home" className="text-primary-light/70 hover:text-accent transition-colors">Home</a></li>
              <li><a href="#about" className="text-primary-light/70 hover:text-accent transition-colors">About Us</a></li>
              <li><a href="#shop" className="text-primary-light/70 hover:text-accent transition-colors">Products</a></li>
              <li><a href="#team" className="text-primary-light/70 hover:text-accent transition-colors">Team</a></li>
              <li><a href="#contact" className="text-primary-light/70 hover:text-accent transition-colors">Contact</a></li>
            </ul>
          </div>
          
          <div className="col-span-1 lg:col-span-2">
            <h4 className="text-base md:text-lg font-bold mb-4 md:mb-6">Subscribe to Our Newsletter</h4>
            <p className="text-primary-light/70 mb-4 text-sm md:text-base">Stay updated with our latest sustainable innovations and community impact stories.</p>
            <form className="flex flex-col sm:flex-row gap-3 md:gap-4" onSubmit={(e) => e.preventDefault()}>
              <input 
                type="email" 
                placeholder="Enter your email" 
                className="flex-grow px-4 md:px-5 py-3 rounded-xl bg-white/10 border border-white/20 focus:border-accent focus:ring-1 focus:ring-accent outline-none text-white placeholder-white/50 transition-all text-sm md:text-base"
                required 
              />
              <button 
                type="submit"
                className="w-full sm:w-auto px-6 py-3 bg-primary hover:bg-primary-dark text-white font-bold rounded-xl transition-colors whitespace-nowrap text-sm md:text-base"
              >
                Subscribe
              </button>
            </form>
          </div>
          
        </div>
        
        <div className="border-t border-white/10 pt-6 md:pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
          <p className="text-primary-light/50 text-xs md:text-sm">
            &copy; {new Date().getFullYear()} EcoNeemTech. All rights reserved.
          </p>
          <div className="flex gap-4 md:gap-6 text-xs md:text-sm">
            <a href="#" className="text-primary-light/50 hover:text-white transition-colors">Privacy Policy</a>
            <a href="#" className="text-primary-light/50 hover:text-white transition-colors">Terms of Service</a>
          </div>
        </div>
      </div>
    </footer>
  );
}
