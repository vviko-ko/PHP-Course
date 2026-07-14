import { motion } from 'framer-motion';
import { FaLinkedinIn, FaTwitter, FaEnvelope } from 'react-icons/fa';

export default function Team() {
  const teamMembers = [
    { 
      name: "Sarah Mwuese Benjamin", 
      position: "Director", 
      image: "/Images/icon.jpg",
      bio: "A founding Director and Person of Significant Control, Sarah brings direct ownership and strategic oversight to EcoNeemTech's mission of natural innovation."
    },
    { 
      name: "Zulfikar Aliyu Adamu", 
      position: "Director", 
      image: "/Images/icon.jpg",
      bio: "A founding Director and Person of Significant Control, Zulfikar shares equal stewardship of the company's governance and long-term direction."
    }
  ];

  return (
    <section id="team" className="py-16 md:py-24 lg:py-32 bg-white relative border-b border-primary-light/20">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center max-w-3xl mx-auto mb-12 md:mb-20">
          <span className="text-primary font-bold tracking-wider uppercase text-xs md:text-sm mb-3 md:mb-4 block">Our Leadership</span>
          <h2 className="text-3xl md:text-4xl lg:text-5xl font-serif text-primary-dark">Meet the Directors</h2>
          <p className="mt-4 md:mt-6 text-text-muted font-light text-base md:text-lg">EcoNeemTech is led by a founding Board of Directors with direct, accountable ownership in the company's success. Part of an 8-member founding shareholder base.</p>
        </div>
        
        <div className="flex flex-col md:flex-row justify-center gap-8 md:gap-12">
          {teamMembers.map((member, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: index * 0.2 }}
              className="group relative w-full md:w-[450px]"
            >
              <div className="bg-bg-body p-6 md:p-8 border border-primary-light/30 flex flex-col items-center text-center hover:border-primary-dark/20 transition-colors h-full">
                <div className="w-24 h-24 md:w-32 md:h-32 rounded-full overflow-hidden mb-4 md:mb-6 border-4 border-white shadow-lg">
                  <img 
                    src={member.image} 
                    alt={member.name} 
                    className="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-700"
                  />
                </div>
                
                <h3 className="text-xl md:text-2xl font-serif text-primary-dark mb-1 md:mb-2">{member.name}</h3>
                <p className="text-primary font-bold tracking-widest uppercase text-[10px] md:text-xs mb-4 md:mb-6">{member.position}</p>
                <p className="text-sm md:text-base text-text-muted font-light leading-relaxed mb-6 md:mb-8">{member.bio}</p>
                
                <div className="flex gap-4 mt-auto">
                  <a href="#" className="text-primary-light/70 hover:text-primary transition-colors">
                    <FaLinkedinIn size={18} className="md:w-5 md:h-5" />
                  </a>
                  <a href="#" className="text-primary-light/70 hover:text-primary transition-colors">
                    <FaTwitter size={18} className="md:w-5 md:h-5" />
                  </a>
                  <a href="#" className="text-primary-light/70 hover:text-primary transition-colors">
                    <FaEnvelope size={18} className="md:w-5 md:h-5" />
                  </a>
                </div>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
