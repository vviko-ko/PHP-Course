import { motion } from 'framer-motion';
import { Mail, Phone, MapPin, Send } from 'lucide-react';

export default function Contact() {
  return (
    <section id="contact" className="py-24 bg-bg-soft relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center max-w-3xl mx-auto mb-16">
          <span className="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">Contact Us</span>
          <h2 className="text-3xl md:text-5xl font-bold text-primary-dark">Get in Touch</h2>
        </div>
        
        <div className="flex flex-col lg:flex-row gap-8 bg-white rounded-3xl overflow-hidden shadow-xl shadow-primary/5 border border-gray-100">
          
          {/* Info Panel */}
          <div className="lg:w-2/5 bg-primary-dark p-10 md:p-14 text-white relative overflow-hidden">
            <div className="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full mix-blend-screen opacity-20 translate-x-1/3 -translate-y-1/3 blur-2xl"></div>
            
            <h3 className="text-3xl font-bold mb-4 relative z-10">Contact Information</h3>
            <p className="text-primary-light/80 mb-12 relative z-10 text-lg">Ready to start a project? Reach out to us today.</p>
            
            <div className="space-y-8 relative z-10">
              <div className="flex items-start gap-4">
                <div className="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                  <Mail className="text-accent" />
                </div>
                <div>
                  <h4 className="text-lg font-semibold text-white mb-1">Email</h4>
                  <p className="text-primary-light">econeemtech@gmail.com</p>
                </div>
              </div>
              
              <div className="flex items-start gap-4">
                <div className="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                  <Phone className="text-accent" />
                </div>
                <div>
                  <h4 className="text-lg font-semibold text-white mb-1">Phone</h4>
                  <p className="text-primary-light">+234 703 909 5798</p>
                </div>
              </div>
              
              <div className="flex items-start gap-4">
                <div className="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                  <MapPin className="text-accent" />
                </div>
                <div>
                  <h4 className="text-lg font-semibold text-white mb-1">Location</h4>
                  <p className="text-primary-light leading-relaxed">Plot 805, Paul Unongo Street,<br/>Jabi, Abuja, FCT, Nigeria</p>
                </div>
              </div>
            </div>
          </div>
          
          {/* Form Panel */}
          <div className="lg:w-3/5 p-10 md:p-14">
            <form className="space-y-6" onSubmit={(e) => e.preventDefault()}>
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label className="block text-sm font-medium text-text-main mb-2">First Name</label>
                  <input type="text" className="w-full px-5 py-4 rounded-xl bg-bg-soft border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="John" required />
                </div>
                <div>
                  <label className="block text-sm font-medium text-text-main mb-2">Last Name</label>
                  <input type="text" className="w-full px-5 py-4 rounded-xl bg-bg-soft border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="Doe" required />
                </div>
              </div>
              
              <div>
                <label className="block text-sm font-medium text-text-main mb-2">Email Address</label>
                <input type="email" className="w-full px-5 py-4 rounded-xl bg-bg-soft border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="john@example.com" required />
              </div>
              
              <div>
                <label className="block text-sm font-medium text-text-main mb-2">Message</label>
                <textarea rows="4" className="w-full px-5 py-4 rounded-xl bg-bg-soft border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all resize-none" placeholder="How can we help you?" required></textarea>
              </div>
              
              <button type="submit" className="w-full bg-primary text-white py-4 rounded-xl font-bold text-lg hover:bg-primary-dark transition-colors shadow-lg shadow-primary/30 flex items-center justify-center gap-2 group">
                Send Message
                <Send size={18} className="group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" />
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  );
}
